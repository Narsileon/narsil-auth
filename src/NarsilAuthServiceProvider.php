<?php

namespace Narsil\Auth;

#region USE

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Fortify;
use Narsil\Auth\Actions\CreateNewUser;
use Narsil\Auth\Actions\ResetUserPassword;
use Narsil\Auth\Http\Controllers\ConfirmPasswordController;
use Narsil\Auth\Http\Controllers\ForgotPasswordController;
use Narsil\Auth\Http\Controllers\LoginController;
use Narsil\Auth\Http\Controllers\RegisterController;
use Narsil\Auth\Http\Controllers\ResetPasswordController;
use Narsil\Auth\Http\Controllers\TwoFactorController;
use Narsil\Auth\Http\Controllers\VerifyEmailController;
use Narsil\Auth\Models\LoginLog;
use Narsil\Auth\Models\User;
use Narsil\Auth\Policies\LoginLogPolicy;
use Narsil\Auth\Services\DeviceService;
use Narsil\Framework\Policies\UserPolicy;
use Narsil\Localization\Services\LocalizationService;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class NarsilAuthServiceProvider extends ServiceProvider
{
    #region PUBLIC METHODS

    /**
     * @return void
     */
    public function register(): void
    {
        $this->registerLoginResponse();
        $this->registerLogoutResponse();
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->bootAuthUsing();
        $this->bootMigrations();
        $this->bootPolicies();
        $this->bootPublishes();
        $this->bootRateLimiters();
        $this->bootRoutes();
        $this->bootTranslations();
        $this->bootUserActions();
        $this->bootViews();
    }

    #endregion

    #region PRIVATE METHODS

    /**
     * @return void
     */
    private function bootAuthUsing(): void
    {
        Fortify::authenticateUsing(function (Request $request)
        {
            $user = User::where(User::EMAIL, $request->{User::EMAIL})->first();

            if (!$user || !$user?->{User::ACTIVE})
            {
                return null;
            }

            if ($user && Hash::check($request->password, $user->password))
            {
                return $user;
            }
        });
    }

    /**
     * @return void
     */
    private function bootMigrations(): void
    {
        $this->loadMigrationsFrom([
            __DIR__ . '/../database/migrations',
        ]);
    }

    /**
     * @return void
     */
    private function bootPolicies(): void
    {
        Gate::policy(LoginLog::class, LoginLogPolicy::class);
        Gate::policy(User::class, UserPolicy::class);
    }

    /**
     * @return void
     */
    private function bootPublishes(): void
    {
        $this->publishes([
            __DIR__ . './Config' => config_path(),
        ], 'config');
    }

    /**
     * @return void
     */
    private function bootRateLimiters(): void
    {
        RateLimiter::for('login', function (Request $request)
        {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request)
        {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }

    /**
     * @return void
     */
    private function bootRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    /**
     * @return void
     */
    private function bootTranslations(): void
    {
        $this->loadJsonTranslationsFrom(__DIR__ . '/../lang', 'auth');
    }

    /**
     * @return void
     */
    private function bootUserActions(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
    }

    /**
     * @return void
     */
    private function bootViews(): void
    {
        Fortify::confirmPasswordView((new ConfirmPasswordController()));
        Fortify::loginView((new LoginController()));
        Fortify::registerView((new RegisterController()));
        Fortify::requestPasswordResetLinkView((new ForgotPasswordController()));
        Fortify::resetPasswordView((new ResetPasswordController()));
        Fortify::twoFactorChallengeView((new TwoFactorController()));
        Fortify::verifyEmailView((new VerifyEmailController()));
    }

    /**
     * @return void
     */
    private function registerLoginResponse(): void
    {
        $this->app->instance(LoginResponse::class, new class implements LoginResponse
        {
            public function toResponse($request)
            {
                $device = DeviceService::getDevice($request->userAgent());

                LoginLog::create([
                    LoginLog::DEVICE => $device,
                    LoginLog::IP_ADDRESSES => $request->ips(),
                    LoginLog::SESSION_ID => $request->session()->getId(),
                    LoginLog::USER_ID => Auth::id(),
                ]);

                if (Session::get('url.intended'))
                {
                    return redirect()->intended()
                        ->with('success', LocalizationService::trans('Login successful.'));
                }
                else
                {
                    return redirect('/')
                        ->with('success', LocalizationService::trans('Login successful.'));
                }
            }
        });
    }

    /**
     * @return void
     */
    private function registerLogoutResponse(): void
    {
        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
        {
            public function toResponse($request)
            {
                return redirect('/')
                    ->with('success', LocalizationService::trans('Logout successful.'));
            }
        });
    }

    #endregion
}
