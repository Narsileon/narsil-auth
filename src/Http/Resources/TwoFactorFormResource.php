<?php

namespace Narsil\Auth\Http\Resources;

#region USE

use Narsil\Auth\Models\User;
use Narsil\Forms\Builder\AbstractFormNode;
use Narsil\Forms\Builder\Inputs\FormString;
use Narsil\Forms\Http\Resources\AbstractFormResource;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class TwoFactorFormResource extends AbstractFormResource
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            resource: null,
            slug: 'two-factor',
            title: 'Two-factor authentication'
        );
    }

    #endregion

    #region PROTECTED METHODS

    /**
     * @return array<AbstractFormNode>
     */
    protected function getSchema(): array
    {
        return [
            (new FormString(User::CODE))
                ->type('code')
                ->required(),
        ];
    }

    #endregion
}
