<?php

namespace Narsil\Auth\Models;

#region USE

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Auth;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class UserHasFavorite extends Model
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
    final public const ID = 'id';
    /**
     * @var string
     */
    final public const MODEL_ID = 'model_id';
    /**
     * @var string
     */
    final public const MODEL_TYPE = 'model_type';
    /**
     * @var string
     */
    final public const USER_ID = 'user_id';

    /**
     * @var string
     */
    final public const RELATIONSHIP_MODEL = 'model';
    /**
     * @var string
     */
    final public const RELATIONSHIP_USER = 'user';

    /**
     * @var string
     */
    final public const TABLE = 'user_has_favorites';

    #endregion

    #region RELATIONSHIPS

    /**
     * @return MorphTo
     */
    final public function model(): MorphTo
    {
        return $this->morphTo(
            self::RELATIONSHIP_MODEL,
            self::MODEL_TYPE,
            self::MODEL_ID
        );
    }

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

    #region SCOPES

    /**
     * @param Builder $query
     * @param string $model
     *
     * @return void
     */
    final public function scopeModel(Builder $query, string $model): void
    {
        $query->where([
            self::USER_ID => Auth::id(),
            self::MODEL_TYPE => $model,
        ]);
    }

    #endregion
}
