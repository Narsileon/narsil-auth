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
class ForgotPasswordFormResource extends AbstractFormResource
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            resource: null,
            slug: 'forgot-password',
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
                ->description('Please enter your email and we will send you instructions for resetting your password.')
                ->minLength(3)
                ->placeholder('placeholders.email')
                ->required(),
        ];
    }

    #endregion
}
