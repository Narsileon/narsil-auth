<?php

namespace Narsil\Auth\Http\Requests;

#region USE

use Narsil\Auth\Models\User;
use Narsil\Forms\Http\Requests\AbstractFormRequest;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ProfileUpdateRequest extends AbstractFormRequest
{
    #region PUBLIC METHODS

    public function rules(): array
    {
        return [
            User::BIRTH_COUNTRY => [
                self::OPTIONAL,
                self::TYPE_STRING,
            ],
            User::BIRTHDATE => [
                self::OPTIONAL,
                self::TYPE_DATE,
            ],
            User::BIRTHPLACE => [
                self::OPTIONAL,
                self::TYPE_STRING,
            ],
            User::FIRST_NAME => [
                self::REQUIRED,
                self::TYPE_STRING,
            ],
            User::LAST_NAME => [
                self::REQUIRED,
                self::TYPE_STRING,
            ],
            User::USERNAME => [
                self::REQUIRED,
                self::TYPE_STRING,
            ],
        ];
    }

    #endregion
}
