<?php

namespace Narsil\Auth\Http\Middleware;

#region USE

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Narsil\Auth\Constants\AuthSettings;
use Narsil\Settings\Models\Setting;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class PublicMiddleware
{
    #region PUBLIC METHODS

    /**
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (!Setting::get(AuthSettings::PUBLIC, true))
        {
            $user = Auth::user();

            if (!$user)
            {
                return redirect(route('login'));
            }

            else
            {
                if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail())
                {
                    return redirect(route('verification.notice'));
                }

                return $next($request);
            }
        }

        return $next($request);
    }

    #endregion
}
