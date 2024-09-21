<?php

namespace Narsil\Auth\Http\Resources\User;

#region USE

use Illuminate\Support\Collection;
use Narsil\Auth\Models\User;
use Narsil\Tables\Http\Resources\DataTableCollection;
use Narsil\Tables\Structures\ModelColumn;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class UserDataTableCollection extends DataTableCollection
{
    #region PROTECTED METHODS

    /**
     * @return Collection<ModelColumn>
     */
    protected function getColumns(): Collection
    {
        $columns = parent::getColumns();

        $columns->forget(User::PASSWORD);
        $columns->forget(User::REMEMBER_TOKEN);
        $columns->forget(User::TWO_FACTOR_RECOVERY_CODES);
        $columns->forget(User::TWO_FACTOR_SECRET);

        return $columns;
    }

    #endregion
}
