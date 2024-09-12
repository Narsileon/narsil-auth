<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\AuthConfig;
use Narsil\Auth\Constants\AuthSettings;
use Narsil\Auth\Http\Resources\RegisterFormResource;
use Narsil\Settings\Models\Setting;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class RegisterController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        if (!Setting::get(AuthSettings::REGISTERABLE, true))
        {
            return redirect('login');
        }

        $form = (new RegisterFormResource())->getForm();
        $layout = Config::get(AuthConfig::LAYOUT, 'session');

        return Inertia::render('narsil/auth::Register/Index', compact(
            'form',
            'layout',
        ));
    }

    #endregion
}
