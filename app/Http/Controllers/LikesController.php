<?php

namespace App\Http\Controllers;

use App\Events\MatchEvent;
use App\Models\Like;

class LikesController extends Controller {

    public function addLiked(string $likedUserId)
    {
        $userId = session('loginId');
        $like = new Like();
        $like->user_id = $userId;
        $like->liked_user_id = $likedUserId;
        $like->save();

        $isMatch = Like::where([
            ['user_id', $likedUserId], ['liked_user_id', $userId]
        ])->count();

        if($isMatch > 0){
            event(new MatchEvent($userId, $likedUserId));
        }

        return redirect('/home');
    }
}
