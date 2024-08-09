<?php

namespace Narsil\Auth\Traits;

#region USE

use Narsil\Auth\Scopes\FullNameScope;

#endregion

trait HasFullName
{
    #region PUBLIC METHODS

    /**
     * @return void
     */
    public static function bootHasFullName(): void
    {
        static::addGlobalScope(new FullNameScope);
    }

    #endregion
}
