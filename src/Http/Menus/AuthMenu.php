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
class AuthMenu extends AbstractMenu
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
            MenuNode::VISIBILITY => VisibilityEnum::AUTH->value,
            MenuNode::RELATIONSHIP_ICON => 'lucide/user',
        ], [
            MenuNode::LABEL => 'Login logs',
            MenuNode::URL => '/backend/login-logs',
            MenuNode::VISIBILITY => VisibilityEnum::AUTH->value,
            MenuNode::RELATIONSHIP_ICON => 'lucide/log-in',
        ]];
    }

    /**
     * @return array
     */
    public static function getMenuNodes(): array
    {
        return [[
            MenuNode::LABEL => 'Password reset',
            MenuNode::URL => '/forgot-password',
            MenuNode::VISIBILITY => VisibilityEnum::GUEST->value,
        ], [
            MenuNode::LABEL => 'Sign in',
            MenuNode::URL => '/login',
            MenuNode::VISIBILITY => VisibilityEnum::GUEST->value,
            MenuNode::RELATIONSHIP_ICON => 'lucide/log-in',
        ], [
            MenuNode::LABEL => 'Password reset',
            MenuNode::URL => '/reset-password ',
            MenuNode::VISIBILITY => VisibilityEnum::GUEST->value,
        ], [
            MenuNode::LABEL => 'Register',
            MenuNode::URL => '/register',
            MenuNode::VISIBILITY => VisibilityEnum::GUEST->value,
            MenuNode::RELATIONSHIP_ICON => 'lucide/user-plus',
        ], [
            MenuNode::LABEL => 'Two-factor authentication',
            MenuNode::URL => '/two-factor-challenge',
            MenuNode::VISIBILITY => VisibilityEnum::GUEST->value,
        ], [
            MenuNode::LABEL => 'Password confirmation',
            MenuNode::URL => ' /user/confirm-password',
            MenuNode::VISIBILITY => VisibilityEnum::GUEST->value,
        ]];
    }

    #endregion
}
