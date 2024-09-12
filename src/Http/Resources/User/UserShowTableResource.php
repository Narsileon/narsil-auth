<?php

namespace Narsil\Auth\Http\Resources\User;

#region USE

use Illuminate\Http\Request;
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
        $attributes = $this->resource->toArray();

        return $attributes;
    }

    #endregion
}
