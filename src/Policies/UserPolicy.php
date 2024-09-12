<?php

namespace Narsil\Auth\Policies;

#region USE

use Narsil\Auth\Models\User;
use Narsil\Policies\Policies\AbstractPolicy;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class UserPolicy extends AbstractPolicy
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            User::class,
            canDelete: false,
        );
    }

    #endregion
}
