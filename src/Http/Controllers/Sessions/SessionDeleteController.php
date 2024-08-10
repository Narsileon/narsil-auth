<?php

namespace Narsil\Auth\Http\Controllers\Sessions;

#region USE

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Narsil\Auth\Models\Session;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class SessionController
{
    #region PUBLIC METHODS

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Session $session): RedirectResponse
    {
        $session->delete();

        return back();
    }

    #endregion
}
