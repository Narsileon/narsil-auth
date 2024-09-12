<?php

namespace Narsil\Auth\Http\Controllers\Profile;

#region USE

use Narsil\Auth\Http\Requests\PasswordUpdateRequest;
use Narsil\Auth\Models\User;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class PasswordUpdateController
{
    #region PUBLIC METHODS

    public function __invoke(PasswordUpdateRequest $request)
    {
        $attributes = $request->validated();

        $user = $request->user();

        $user->forceFill([
            User::PASSWORD => $attributes[User::PASSWORD],
        ])->save();

        return back()
            ->with('success', 'messages.password_updated');
    }

    #endregion
}
