<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\AuthConfig;
use Narsil\Auth\Constants\AuthSettings;
use Narsil\Auth\Http\Forms\LoginForm;
use Narsil\Settings\Models\Setting;

#endregion

class LoginController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $form = (new LoginForm())->get();
        $layout = Config::get(AuthConfig::LAYOUT, 'session');
        $registerable = Setting::get(AuthSettings::REGISTERABLE, true);
        $status = session('status');

        return Inertia::render('narsil/auth::Login/Index', compact(
            'form',
            'layout',
            'registerable',
            'status',
        ));
    }

    #endregion
}
