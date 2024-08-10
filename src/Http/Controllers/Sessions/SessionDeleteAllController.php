<?php

namespace Narsil\Auth\Http\Controllers\Sessions;

#region USE

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Narsil\Auth\Models\User;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class SessionDeleteAllController
{
    #region PUBLIC METHODS

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $sessions = Auth::user()->{User::RELATIONSHIP_SESSIONS};

        $sessions->each->delete();

        return back();
    }

    #endregion
}
