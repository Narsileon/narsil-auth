<?php

namespace Narsil\Auth\Http\Menus;

#region USE

use Narsil\Menus\Enums\VisibilityEnum;
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
            MenuNode::VISIBILITY => VisibilityEnum::AUTH,
            MenuNode::RELATIONSHIP_ICON => 'lucide/user',
        ], [
            MenuNode::LABEL => 'Login logs',
            MenuNode::URL => '/backend/login-logs',
            MenuNode::VISIBILITY => VisibilityEnum::AUTH,
            MenuNode::RELATIONSHIP_ICON => 'lucide/log-in',
        ]];
    }

    #endregion
}
