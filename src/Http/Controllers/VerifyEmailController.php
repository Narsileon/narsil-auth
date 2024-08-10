<?php

namespace Narsil\Auth\Http\Controllers;

#region USE

use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Constants\ConfigKeys;

#endregion

class VerifyEmailController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $layout = Config::get(ConfigKeys::LAYOUT, 'session');

        return Inertia::render('narsil/auth::VerifyEmail/Index', compact(
            'layout',
        ));
    }

    #endregion
}
