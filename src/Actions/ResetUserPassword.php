<?php

namespace Narsil\Auth\Actions;

#region USE

use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Narsil\Auth\Models\User;
use Narsil\Forms\Http\Requests\AbstractFormRequest;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ResetUserPassword implements ResetsUserPasswords
{
    #region PUBLIC METHODS

    /**
     * @param User $user
     * @param array $input
     *
     * @return void
     */
    public function reset(User $user, array $input): void
    {
        Validator::make($input, [
            User::PASSWORD => [
                AbstractFormRequest::REQUIRED,
                AbstractFormRequest::TYPE_STRING,
                AbstractFormRequest::min(3),
                AbstractFormRequest::max(255),
                AbstractFormRequest::CONFIRMED,
            ],
        ])->validate();

        $user->forceFill([
            User::PASSWORD => $input[User::PASSWORD],
        ])->save();
    }

    #endregion
}
