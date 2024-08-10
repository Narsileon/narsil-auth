<?php

namespace Narsil\Auth\Models;

#region USE

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Narsil\Auth\Interfaces\IHasFullName;
use Narsil\Auth\Models\Session;
use Narsil\Auth\Traits\HasFullName;
use Narsil\Policies\Interfaces\IHasRoles;
use Narsil\Policies\Traits\HasRoles;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class User extends Authenticatable implements
    IHasFullName,
    IHasRoles,
    MustVerifyEmail
{
    use HasFullName;
    use HasRoles;
    use TwoFactorAuthenticatable;

    #region CONSTRUCTOR

    /**
     * @param array $attributes
     * @param string $table
     *
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->table = self::TABLE;

        $this->casts = [
            self::ACTIVE => "boolean",
            self::PASSWORD => "hashed",
        ];

        $this->guarded = [
            self::ID,
        ];

        $this->hidden = [
            self::EMAIL_VERIFIED_AT,
            self::PASSWORD,
            self::REMEMBER_TOKEN,
            self::TWO_FACTOR_CONFIRMED_AT,
            self::TWO_FACTOR_RECOVERY_CODES,
            self::TWO_FACTOR_SECRET,
        ];

        parent::__construct($attributes);
    }

    #endregion

    #region CONSTANTS

    /**
     * @var string
     */
    final public const ACTIVE = "active";
    /**
     * @var string
     */
    final public const BIRTH_COUNTRY = "birth_country";
    /**
     * @var string
     */
    final public const BIRTHDATE = "birthdate";
    /**
     * @var string
     */
    final public const BIRTHPLACE = "birthplace";
    /**
     * @var string
     */
    final public const CODE = "code";
    /**
     * @var string
     */
    final public const CURRENT_PASSWORD = "current_password";
    /**
     * @var string
     */
    final public const EMAIL = "email";
    /**
     * @var string
     */
    final public const EMAIL_VERIFIED_AT = "email_verified_at";
    /**
     * @var string
     */
    final public const ID = "id";
    /**
     * @var string
     */
    final public const PASSWORD = "password";
    /**
     * @var string
     */
    final public const PASSWORD_CONFIRMATION = "password_confirmation";
    /**
     * @var string
     */
    final public const REMEMBER = "remember";
    /**
     * @var string
     */
    final public const REMEMBER_TOKEN = "remember_token";
    /**
     * @var string
     */
    final public const TWO_FACTOR_CONFIRMED_AT = "two_factor_confirmed_at";
    /**
     * @var string
     */
    final public const TWO_FACTOR_RECOVERY_CODES = "two_factor_recovery_codes";
    /**
     * @var string
     */
    final public const TWO_FACTOR_SECRET = "two_factor_secret";
    /**
     * @var string
     */
    final public const USERNAME = "username";

    /**
     * @var string
     */
    final public const RELATIONSHIP_SESSIONS = "sessions";

    /**
     * @var string
     */
    final public const TABLE = "users";

    #endregion

    #region RELATIONSHIPS

    /**
     * @return HasMany
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(
            Session::class,
            Session::USER_ID,
            self::ID
        );
    }

    #endregion
}
