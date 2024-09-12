<?php

namespace Narsil\Auth\Http\Controllers\Profile;

#region USE

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Auth\Http\Resources\ChangePasswordFormResource;
use Narsil\Auth\Http\Resources\Sessions\SessionResource;
use Narsil\Auth\Http\Resources\TwoFactorFormResource;
use Narsil\Auth\Http\Resources\User\UserShowTableResource;
use Narsil\Auth\Models\Session;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ProfileIndexController
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $user = Auth::user();

        $changePasswordForm = (new ChangePasswordFormResource())->getForm();
        $sessions = $this->getSessions();
        $twoFactorForm = (new TwoFactorFormResource())->getForm();
        $user = new UserShowTableResource($user);

        return Inertia::render('narsil/auth::Profile/Index', compact(
            'changePasswordForm',
            'sessions',
            'twoFactorForm',
            'user'
        ));
    }

    #endregion

    #region PRIVATE METHODS

    /**
     * @return AnonymousResourceCollection
     */
    private function getSessions(): AnonymousResourceCollection
    {
        $sessions = collect([]);

        if (config('session.driver') === 'database')
        {
            $sessions = Session::query()
                ->where(Session::USER_ID, Auth::id())
                ->orderBy(Session::LAST_ACTIVITY, 'desc')
                ->get();
        }

        return SessionResource::collection($sessions);
    }

    #endregion
}
