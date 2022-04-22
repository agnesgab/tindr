<?php

namespace App\Http\Controllers;

use App\Models\Dislike;

class DislikesController extends Controller {

    public function addDisliked(string $dislikedUserId)
    {
        $userId = session('loginId');
        $dislike = new Dislike();
        $dislike->user_id = $userId;
        $dislike->disliked_user_id = $dislikedUserId;
        $dislike->save();

        return redirect('/home');
    }

}
