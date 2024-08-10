<?php

namespace Narsil\Auth\Http\Resources;

#region USE

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Narsil\Auth\Models\Session;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class SessionResource extends JsonResource
{
    #region PUBLIC METHODS

    public function toArray($request)
    {
        return [
            Session::ID => $this->{Session::ID},
            Session::IP_ADDRESS => $this->{Session::IP_ADDRESS},
            Session::LAST_ACTIVITY => Carbon::createFromTimestamp($this->{Session::LAST_ACTIVITY})->diffForHumans(),
            Session::ATTRIBUTE_DEVICE => $this->{Session::ATTRIBUTE_DEVICE},
            Session::ATTRIBUTE_IS_CURRENT_DEVICE => $this->{Session::ATTRIBUTE_IS_CURRENT_DEVICE},
        ];
    }

    #endregion
}
