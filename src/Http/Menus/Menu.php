<?php

namespace Narsil\Auth\Http\Menus;

#region USE

use Narsil\Menus\Http\Menus\AbstractMenu;
use Narsil\Menus\Models\MenuNode;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class Menu extends AbstractMenu
{
    #region PUBLIC METHODS

    /**
     * @return array
     */
    public static function getBackendMenu(): array
    {
        return [[
            MenuNode::LABEL => 'Users',
            MenuNode::URL => '/backend/users',
            MenuNode::RELATIONSHIP_ICON => 'lucide/user',
        ],];
    }

    #endregion
}
