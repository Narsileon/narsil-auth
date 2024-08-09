<?php

namespace Narsil\Auth\Actions;

#region USE

use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Narsil\Forms\Http\Requests\AbstractFormRequest;
use Narsil\Auth\Models\User;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class CreateNewUser implements CreatesNewUsers
{
    #region PUBLIC METHODS

    /**
     * @param array $input
     *
     * @return User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            User::EMAIL => [
                AbstractFormRequest::REQUIRED,
                AbstractFormRequest::TYPE_EMAIL,
                AbstractFormRequest::min(3),
                AbstractFormRequest::max(255),
                AbstractFormRequest::unique(User::TABLE, User::EMAIL),
            ],
            User::FIRST_NAME => [
                AbstractFormRequest::REQUIRED,
                AbstractFormRequest::TYPE_STRING,
                AbstractFormRequest::min(3),
                AbstractFormRequest::max(255),
            ],
            User::LAST_NAME => [
                AbstractFormRequest::REQUIRED,
                AbstractFormRequest::TYPE_STRING,
                AbstractFormRequest::min(3),
                AbstractFormRequest::max(255),
            ],
            User::PASSWORD => [
                AbstractFormRequest::REQUIRED,
                AbstractFormRequest::TYPE_STRING,
                AbstractFormRequest::min(3),
                AbstractFormRequest::max(255),
                AbstractFormRequest::CONFIRMED,
            ],
            User::USERNAME => [
                AbstractFormRequest::REQUIRED,
                AbstractFormRequest::TYPE_STRING,
                AbstractFormRequest::min(3),
                AbstractFormRequest::max(255),
                AbstractFormRequest::unique(User::TABLE, User::USERNAME),
            ],
        ])->validate();

        $user = User::create([
            User::EMAIL => $input[User::EMAIL],
            User::FIRST_NAME => $input[User::FIRST_NAME],
            User::LAST_NAME => $input[User::LAST_NAME],
            User::PASSWORD => $input[User::PASSWORD],
            User::USERNAME => $input[User::USERNAME],
        ]);

        return $user;
    }

    #endregion
}
