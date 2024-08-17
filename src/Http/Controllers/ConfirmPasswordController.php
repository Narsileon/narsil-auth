<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\AuthConfig;
use Narsil\Auth\Http\Forms\ConfirmPasswordForm;

#endregion

class ConfirmPasswordController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $form = (new ConfirmPasswordForm())->get();
        $layout = Config::get(AuthConfig::LAYOUT, 'session');

        return Inertia::render('narsil/auth::ConfirmPassword/Index', compact(
            'form',
            'layout',
        ));
    }

    #endregion
}
