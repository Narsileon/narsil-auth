<?php

namespace Narsil\Auth\Http\Controllers\Profile;

#region USE

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Narsil\Framework\Http\Requests\Users\ProfileUpdateRequest;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ProfileUpdateController
{
    #region PUBLIC METHODS

    public function __invoke(ProfileUpdateRequest $request)
    {
        $attributes = $request->validated();

        $user = $request->user();

        $user->update($attributes);

        return redirect(route('profile'))
            ->with('success', 'messages.profile_updated');
    }

    #endregion
}
