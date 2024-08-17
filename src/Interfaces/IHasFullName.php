<?php

namespace Narsil\Auth\Interfaces;

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
interface IHasFullName
{
    #region CONSTANTS

    /**
     * @var string
     */
    final public const FIRST_NAME = 'first_name';
    /**
     * @var string
     */
    final public const FULL_NAME = 'full_name';
    /**
     * @var string
     */
    final public const LAST_NAME = 'last_name';

    #endregion
}
