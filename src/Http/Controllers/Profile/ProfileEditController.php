<?php

namespace Narsil\Auth\Http\Controllers\Profile;

#region USE

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Http\Resources\ProfileFormResource;
use Narsil\Localization\Services\LocalizationService;
use Narsil\Menus\Models\MenuNode;

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
        $breadcrumb = [[
            MenuNode::LABEL => LocalizationService::trans('Profile'),
            MenuNode::URL => route('profile'),
        ], [
            MenuNode::LABEL => LocalizationService::trans('Edit'),
            MenuNode::URL => route('profile.edit'),
        ]];

        $user = new ProfileFormResource(Auth::user());

        return Inertia::render('narsil/auth::Profile/Edit/Index', compact(
            'breadcrumb',
            'user',
        ));
    }

    #endregion
}
