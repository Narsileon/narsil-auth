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
class TwoFactorForm extends AbstractForm
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            slug: "two-factor",
            title: "Two-factor authentication"
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
                ->type("code")
                ->required(),
        ];
    }

    #endregion
}
