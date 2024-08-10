<?php

namespace Narsil\Auth\Models;

#region USE

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class PersonalAccessToken extends Model
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
            self::ABILITIES => 'array',
        ];

        parent::__construct($attributes);
    }

    #endregion

    #region CONSTANTS

    /**
     * @var string
     */
    final public const ABILITIES = 'abilities';
    /**
     * @var string
     */
    final public const EXPIRES_AT = 'expires_at';
    /**
     * @var string
     */
    final public const ID = 'id';
    /**
     * @var string
     */
    final public const LAST_USED_AT = 'last_used_at';
    /**
     * @var string
     */
    final public const NAME = 'name';
    /**
     * @var string
     */
    final public const TOKEN = 'token';
    /**
     * @var string
     */
    final public const TOKENABLE_ID = 'tokenable_id';
    /**
     * @var string
     */
    final public const TOKENABLE_TYPE = 'tokenable_type';

    /**
     * @var string
     */
    final public const RELATIONSHIP_TOKENABLE = 'tokenable';

    /**
     * @var string
     */
    final public const TABLE = 'personal_access_tokens';

    #endregion

    #region RELATIONSHIP

    /**
     * @return MorphTo
     */
    final public function tokenable(): MorphTo
    {
        return $this->morphTo(
            self::RELATIONSHIP_TOKENABLE,
            self::TOKENABLE_TYPE,
            self::TOKENABLE_ID
        );
    }

    #endregion
}
