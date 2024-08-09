<?php

namespace Narsil\Auth\Services;

#region USE

use Detection\MobileDetect;
use Illuminate\Http\Request;
use Narsil\Auth\Enums\DeviceEnum;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class DeviceService
{
    #region PUBLIC METHODS

    /**
     * @param string $userAgent
     *
     * @return string
     */
    public static function getDevice(string $userAgent): string
    {
        $detect = new MobileDetect();

        $detect->setUserAgent($userAgent);

        $device = DeviceEnum::DESKTOP->value;

        if ($detect->isMobile())
        {
            $device = DeviceEnum::MOBILE->value;
        }

        if ($detect->isTablet())
        {
            $device = DeviceEnum::TABLET->value;
        }

        return $device;
    }

    #endregion
}
