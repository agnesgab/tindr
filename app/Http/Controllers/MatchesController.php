<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\PublicProfile;

class MatchesController extends Controller {

    public function getMatches()
    {
        $userId = session('loginId');

        $userLikes = Like::where('user_id', $userId)
            ->pluck('liked_user_id')
            ->toArray();

        $usersLikingCurrentUser = Like::where('liked_user_id', $userId)
            ->pluck('user_id')
            ->toArray();

        $matches = array_intersect($userLikes, $usersLikingCurrentUser);
        $profiles = PublicProfile::with(['gender', 'image'])
            ->whereIn('user_id', $matches)
            ->get();

        return view('user.matches.matches', ['profiles' => $profiles]);
    }

}
