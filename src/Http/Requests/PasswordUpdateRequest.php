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
class PasswordUpdateRequest extends AbstractFormRequest
{
    #region PUBLIC METHODS

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            User::CURRENT_PASSWORD => [
                User::CURRENT_PASSWORD . ':' . 'web',
                self::REQUIRED,
                self::TYPE_STRING,
                self::min(8),
                self::max(255),
            ],

            User::PASSWORD => [
                self::REQUIRED,
                self::TYPE_STRING,
                self::min(3),
                self::max(255),
                self::CONFIRMED,
            ],
        ];
    }

    #endregion
}
