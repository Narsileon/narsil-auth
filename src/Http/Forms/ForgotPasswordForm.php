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
class ForgotPasswordForm extends AbstractForm
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            slug: "forgot-password",
            title: "Password reset",
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
                ->type("email")
                ->autoComplete("email")
                ->description("Please enter your email and we will send you instructions for resetting your password.")
                ->minLength(3)
                ->placeholder("placeholders.email")
                ->required(),
        ];
    }

    #endregion
}
