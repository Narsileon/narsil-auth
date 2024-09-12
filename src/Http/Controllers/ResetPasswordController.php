<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\AuthConfig;
use Narsil\Auth\Http\Resources\ResetPasswordFormResource;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ResetPasswordController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $form = (new ResetPasswordFormResource())->getForm();
        $layout = Config::get(AuthConfig::LAYOUT, 'session');
        $token = request()->route('token');

        return Inertia::render('narsil/auth::ResetPassword/Index', compact(
            'form',
            'layout',
            'token',
        ));
    }

    #endregion
}
