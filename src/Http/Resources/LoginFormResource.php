<?php

namespace Narsil\Auth\Http\Resources;

#region USE

use Narsil\Auth\Models\User;
use Narsil\Forms\Builder\AbstractFormNode;
use Narsil\Forms\Builder\Inputs\FormString;
use Narsil\Forms\Builder\Inputs\FormSwitch;
use Narsil\Forms\Http\Resources\AbstractFormResource;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class LoginFormResource extends AbstractFormResource
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            resource: null,
            slug: 'login',
            title: 'Connection',
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
            (new FormString(User::EMAIL))
                ->type('email')
                ->autoComplete('email')
                ->minLength(3)
                ->required(),
            (new FormString(User::PASSWORD))
                ->type('password')
                ->autoComplete('current-password')
                ->minLength(8)
                ->required(),
            (new FormSwitch(User::REMEMBER)),
        ];
    }

    #endregion
}
