<?php

namespace Narsil\Auth\Http\Resources\User;

#region USE

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
class UserFormResource extends AbstractFormResource
{
    #region CONSTRUCTOR

    /**
     * @param mixed $resource
     *
     * @return void
     */
    public function __construct(mixed $resource)
    {
        parent::__construct($resource, 'User', 'user');
    }

    #endregion

    #region PROTECTED METHODS

    /**
     * @return array<AbstractFormNode>
     */
    protected function getSchema(): array
    {
        return [
            (new FormCard('account'))
                ->label('Account')
                ->children([
                    (new FormString(User::EMAIL))
                        ->autocomplete('email')
                        ->required(),
                    (new FormString(User::USERNAME))
                        ->autocomplete('username')
                        ->required(),
                ]),
            (new FormCard('personal-informations'))
                ->label('Personal informations')
                ->children([
                    (new FormString(User::LAST_NAME))
                        ->autocomplete('family-name')
                        ->required(),
                    (new FormString(User::FIRST_NAME))
                        ->autocomplete('given-name')
                        ->required(),
                    (new FormDate(User::BIRTHDATE))
                        ->autocomplete('bday'),
                    (new FormString(User::BIRTHPLACE)),
                    (new FormString(User::BIRTH_COUNTRY))
                        ->autocomplete('country-name'),
                ]),
        ];
    }

    #endregion
}
