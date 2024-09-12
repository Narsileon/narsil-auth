<?php

namespace Narsil\Auth\Http\Resources;

#region USE

use Illuminate\Support\Facades\Auth;
use Narsil\Auth\Models\User;
use Narsil\Forms\Builder\AbstractFormNode;
use Narsil\Forms\Builder\Elements\FormCard;
use Narsil\Forms\Builder\Inputs\FormDate;
use Narsil\Forms\Builder\Inputs\FormString;
use Narsil\Forms\Http\Resources\AbstractFormResource;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ProfileFormResource extends AbstractFormResource
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            resource: Auth::user(),
            slug: 'profile',
            title: 'Profile',
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
            (new FormCard('default'))
                ->children([
                    (new FormString(User::USERNAME))
                        ->required(),
                    (new FormString(User::LAST_NAME))
                        ->required(),
                    (new FormString(User::FIRST_NAME))
                        ->required(),
                    (new FormDate(User::BIRTHDATE)),
                    (new FormString(User::BIRTHPLACE)),
                    (new FormString(User::BIRTH_COUNTRY)),
                ]),
        ];
    }

    #endregion
}
