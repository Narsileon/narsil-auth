<?php

namespace Narsil\Auth\Constants;

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
abstract class AuthSettings
{
    #region CONSTANTS

    /**
     * @var string
     */
    final public const INACTIVITY_DURATION = 'inactivity_duration';
    /**
     * @var string
     */
    final public const PUBLIC = 'public';
    /**
     * @var string
     */
    final public const REGISTERABLE = 'registerable';
    /**
     * @var string
     */
    final public const REMEMBER_DURATION = 'remember_duration';

    #endregion
}
