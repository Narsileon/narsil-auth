<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\ConfigKeys;
use Narsil\Auth\Http\Forms\ResetPasswordForm;

#endregion

class ResetPasswordController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $form = (new ResetPasswordForm())->get();
        $layout = Config::get(ConfigKeys::LAYOUT, 'session');
        $token = request()->route('token');

        return Inertia::render('narsil/auth::ResetPassword/Index', compact(
            'form',
            'layout',
            'token',
        ));
    }

    #endregion
}
