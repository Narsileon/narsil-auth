<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\AuthConfig;
use Narsil\Auth\Http\Resources\ForgotPasswordFormResource;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ForgotPasswordController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $form = (new ForgotPasswordFormResource())->getForm();
        $layout = Config::get(AuthConfig::LAYOUT, 'session');
        $status = session('status');

        return Inertia::render('narsil/auth::ForgotPassword/Index', compact(
            'form',
            'layout',
            'status',
        ));
    }

    #endregion
}
