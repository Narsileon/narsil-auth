<?php

namespace Narsil\Auth\Models;

#region USE

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Narsil\Auth\Enums\DeviceEnum;
use Narsil\Auth\Models\User;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class LoginLog extends Model
{
    #region CONSTRUCTOR

    /**
     * @param array $attributes
     *
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->table = self::TABLE;

        $this->casts = [
            self::DEVICE => DeviceEnum::class,
            self::IP_ADDRESSES => 'array',
        ];

        $this->guarded = [
            self::ID,
        ];

        parent::__construct($attributes, self::TABLE);
    }

    #endregion

    #region CONSTANTS

    /**
     * @var string
     */
    final public const DEVICE = 'device';
    /**
     * @var string
     */
    final public const ID = 'id';
    /**
     * @var string
     */
    final public const IP_ADDRESSES = 'ip_addresses';
    /**
     * @var string
     */
    final public const SESSION_ID = 'session_id';
    /**
     * @var string
     */
    final public const USER_ID = 'user_id';

    /**
     * @var string
     */
    final public const RELATIONSHIP_USER = 'user';

    /**
     * @var string
     */
    final public const TABLE = 'login_logs';

    #endregion

    #region RELATIONSHIPS

    /**
     * @return BelongsTo
     */
    final public function user()
    {
        return $this->belongsTo(
            User::class,
            self::USER_ID,
            User::ID
        );
    }

    #endregion
}
