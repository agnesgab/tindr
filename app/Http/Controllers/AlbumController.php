<?php

namespace App\Http\Controllers;

use App\Models\AlbumImage;

class AlbumController extends Controller
{
    public function storeAlbumImages()
    {
        $userId = session()->get('loginId');
        $path = request()->file('album-image')->store('images', ['disk'=>'public']);
        $imgSrc = "/storage/$path";

        $albumImage = new AlbumImage();
        $albumImage->public_profile_id = $userId;
        $albumImage->image_path = $imgSrc;
        $albumImage->save();

        return redirect('/show/' . $userId);
    }
}
