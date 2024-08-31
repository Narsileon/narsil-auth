<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\AuthConfig;
use Narsil\Auth\Http\Forms\TwoFactorForm;

#endregion

class TwoFactorController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $form = (new TwoFactorForm())->getForm();
        $layout = Config::get(AuthConfig::LAYOUT, 'session');

        return Inertia::render('narsil/auth::TwoFactorChallenge/Index', compact(
            'form',
            'layout',
        ));
    }

    #endregion
}
