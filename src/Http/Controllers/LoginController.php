<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\ConfigKeys;
use Narsil\Auth\Http\Forms\LoginForm;

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
        $layout = Config::get(ConfigKeys::LAYOUT, 'session');
        $status = session('status');

        return Inertia::render('narsil/auth::Login/Index', compact(
            'form',
            'layout',
            'status',
        ));
    }

    #endregion
}
