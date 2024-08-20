<?php

namespace Narsil\Settings\Http\Middleware;

#region USE

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Narsil\Auth\Constants\AuthSettings;
use Narsil\Settings\Models\Setting;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class AuthMiddleware
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
        $this->handleInactivityDuration();
        $this->handleRememberDuration();

        return $next($request);
    }

    #endregion

    #region PRIVATE METHODS

    /**
     * @return void
     */
    private function handleInactivityDuration(): void
    {
        if ($inactivityDuration = Setting::get(AuthSettings::INACTIVITY_DURATION))
        {
            Config::set('session.lifetime', $inactivityDuration);
        }
    }

    /**
     * @return void
     */
    private function handleRememberDuration(): void
    {
        if ($rememberDuration = Setting::get(AuthSettings::REMEMBER_DURATION))
        {
            Config::set('auth.guards.web.remember', $rememberDuration * 24 * 60);
        }
    }

    #endregion
}
