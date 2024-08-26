<?php

namespace Narsil\Auth\Http\Requests;

#region USE

use Narsil\Auth\Models\UserHasFavorite;
use Narsil\Forms\Http\Requests\AbstractFormRequest;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class FavoriteRequest extends AbstractFormRequest
{
    #region PUBLIC METHODS

    /**
     * @return array<string,array<string>>
     */
    public function rules(): array
    {
        return [
            UserHasFavorite::MODEL_ID => [
                self::REQUIRED,
                self::TYPE_INTEGER,
            ],
            UserHasFavorite::MODEL_TYPE => [
                self::REQUIRED,
                self::TYPE_STRING,
            ],
        ];
    }

    #endregion
}
