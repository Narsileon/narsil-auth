<?php

namespace Narsil\Auth\Http\Controllers\Favorites;

#region USE

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Narsil\Auth\Http\Requests\FavoriteRequest;
use Narsil\Auth\Models\UserHasFavorite;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class FavoriteRemoveController
{
    #region PUBLIC METHODS

    /**
     * @param FavoriteRequest $request
     *
     * @return RedirectResponse
     */
    public function __invoke(FavoriteRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $UserHasFavorite = UserHasFavorite::firstWhere(array_merge([
            UserHasFavorite::USER_ID => Auth::id(),
        ], $attributes));

        $UserHasFavorite?->delete();

        return back();
    }

    #endregion
}
