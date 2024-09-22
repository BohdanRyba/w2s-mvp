<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserDataResource;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /**
         * @var User $user
         */
        $user = Auth::user();
        $profile = $user->profile;
        $stores = $user->stores;

        return (new UserDataResource((object)[
            'user' => $user,
            'profile' => $profile,
            'stores' => $stores,
        ]));
    }
}
