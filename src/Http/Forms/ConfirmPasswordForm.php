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
class ConfirmPasswordForm extends AbstractForm
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            slug: "confirm-password",
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
            (new FormString(User::PASSWORD))
                ->type("password")
                ->minLength(8)
                ->required(),
        ];
    }

    #endregion
}
