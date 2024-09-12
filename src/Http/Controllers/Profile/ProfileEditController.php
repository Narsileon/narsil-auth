<?php

namespace Narsil\Auth\Http\Controllers\Profile;

#region USE

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Http\Resources\ProfileFormResource;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ProfileEditController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $user = new ProfileFormResource(Auth::user());

        return Inertia::render('narsil/auth::Profile/Edit/Index', compact(
            'user',
        ));
    }

    #endregion
}
