<?php

namespace Narsil\Auth\Models;

#region USE

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Narsil\Auth\Models\User;
use Narsil\Auth\Services\DeviceService;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class Session extends Model
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

        $this->appends = [
            self::ATTRIBUTE_DEVICE,
            self::ATTRIBUTE_IS_CURRENT_DEVICE,
        ];

        $this->casts = [
            self::ID => "string",
        ];

        $this->guarded = [
            self::ID,
        ];

        parent::__construct($attributes);
    }

    #endregion

    #region CONSTANTS

    /**
     * @var string
     */
    final public const ID = "id";
    /**
     * @var string
     */
    final public const IP_ADDRESS = "ip_address";
    /**
     * @var string
     */
    final public const LAST_ACTIVITY = "last_activity";
    /**
     * @var string
     */
    final public const PAYLOAD = "payload";
    /**
     * @var string
     */
    final public const USER_AGENT = "user_agent";
    /**
     * @var string
     */
    final public const USER_ID = "user_id";

    /**
     * @var string
     */
    final public const ATTRIBUTE_DEVICE = "device";
    /**
     * @var string
     */
    final public const ATTRIBUTE_IS_CURRENT_DEVICE = "is_current_device";

    /**
     * @var string
     */
    final public const RELATIONSHIP_USER = "user";

    /**
     * @var string
     */
    final public const TABLE = "sessions";

    #endregion

    #region ATTRIBUTES

    /**
     * @return Attribute
     */
    final protected function device(): Attribute
    {
        return new Attribute(
            get: function ()
            {
                DeviceService::getDevice($this->{Session::USER_AGENT});
            }
        );
    }

    /**
     * @return Attribute
     */
    final protected function isCurrentDevice(): Attribute
    {
        return new Attribute(
            get: function ()
            {
                $this->{Session::ID} === request()->session()->getId();
            }
        );
    }

    #endregion

    #region RELATIONSHIP

    /**
     * @return BelongsTo
     */
    final public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            self::USER_ID,
            User::ID
        );
    }

    #endregion
}
