<?php

namespace Narsil\Auth\Http\Resources\User;

#region USE

use Illuminate\Http\Request;
use Narsil\Auth\Models\User;
use Narsil\Tables\Http\Resources\ShowTableResource;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class UserShowTableResource extends ShowTableResource
{
    #region PUBLIC METHODS

    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            User::BIRTH_COUNTRY => $this->{User::BIRTH_COUNTRY},
            User::BIRTHDATE => $this->{User::BIRTHDATE},
            User::BIRTHPLACE => $this->{User::BIRTHPLACE},
            User::FIRST_NAME => $this->{User::FIRST_NAME},
            User::FULL_NAME => $this->{User::FIRST_NAME},
            User::LAST_NAME => $this->{User::LAST_NAME},
            User::USERNAME => $this->{User::USERNAME},
        ];

        return $attributes;
    }

    #endregion
}
