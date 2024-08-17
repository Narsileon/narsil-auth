<?php

namespace Narsil\Auth\Http\Forms;

#region USE

use Narsil\Forms\Builder\AbstractForm;
use Narsil\Forms\Builder\AbstractFormNode;
use Narsil\Forms\Builder\Inputs\FormString;
use Narsil\Auth\Models\User;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ResetPasswordForm extends AbstractForm
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            slug: 'reset-password',
            title: 'Password reset',
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
                ->autoComplete('new-password')
                ->minLength(8)
                ->required(),
            (new FormString(User::PASSWORD_CONFIRMATION))
                ->type('password')
                ->autoComplete('new-password')
                ->minLength(8)
                ->required(),
        ];
    }

    #endregion
}
