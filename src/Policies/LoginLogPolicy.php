<?php

namespace Narsil\Auth\Policies;

#region USE

use Narsil\Auth\Models\LoginLog;
use Narsil\Policies\Policies\AbstractPolicy;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class LoginLogPolicy extends AbstractPolicy
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            LoginLog::class,
            canCreate: false,
            canDelete: false,
            canUpdate: false,
        );
    }

    #endregion
}
