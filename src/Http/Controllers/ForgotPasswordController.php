<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\ConfigKeys;
use Narsil\Auth\Http\Forms\ForgotPasswordForm;

#endregion

class ForgotPasswordController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $form = (new ForgotPasswordForm())->get();
        $layout = Config::get(ConfigKeys::LAYOUT, 'session');
        $status = session('status');

        return Inertia::render('narsil/auth::ForgotPassword/Index', compact(
            'form',
            'layout',
            'status',
        ));
    }

    #endregion
}
