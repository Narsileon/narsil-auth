<?php

namespace Narsil\Auth\Http\Forms;

#region USE

use Narsil\Auth\Models\User;
use Narsil\Forms\Builder\AbstractForm;
use Narsil\Forms\Builder\AbstractFormNode;
use Narsil\Forms\Builder\Inputs\FormString;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ChangePasswordForm extends AbstractForm
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            slug: "change-password",
            title: "Password confirmation",
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
            (new FormString(User::CURRENT_PASSWORD))
                ->type('password')
                ->minLength(8)
                ->placeholder('placeholders.password')
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
