<?php

namespace Narsil\Auth\Scopes;

#region USE

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;
use Narsil\Auth\Interfaces\IHasFullName;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class FullNameScope implements Scope
{
    #region PUBLIC METHODS

    /**
     * @param Builder $builder
     * @param Model $model
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model): void
    {
        $sql = "CONCAT(";
        $sql .= IHasFullName::FIRST_NAME;
        $sql .= ",' ',";
        $sql .= IHasFullName::LAST_NAME;
        $sql .= ") AS ";
        $sql .= IHasFullName::FULL_NAME;

        $builder
            ->select('*')
            ->addSelect(DB::raw($sql));
    }

    #endregion
}
