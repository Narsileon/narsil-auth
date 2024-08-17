<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\AuthConfig;
use Narsil\Auth\Http\Forms\RegisterForm;

#endregion

class RegisterController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $form = (new RegisterForm())->get();
        $layout = Config::get(AuthConfig::LAYOUT, 'session');

        return Inertia::render('narsil/auth::Register/Index', compact(
            'form',
            'layout',
        ));
    }

    #endregion
}
