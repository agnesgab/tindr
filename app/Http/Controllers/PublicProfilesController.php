<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Image;
use App\Models\Like;
use App\Models\Preference;
use App\Models\PublicProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PublicProfilesController extends Controller
{
    public function index()
    {
        $userId = session('loginId');
        $preferences = Preference::where('user_id', $userId)->first();
        $likedUsers = Like::where('user_id', $userId)->pluck('liked_user_id')->toArray();
        $dislikedUsers = Dislike::where('user_id', $userId)->pluck('disliked_user_id')->toArray();

        $route = Route::current();
        $uri = $route->uri();

        if ($preferences !== null) {
            $profile = PublicProfile::with(['gender', 'image'])
                ->where([
                    ['user_id', '!=', $userId],
                    ['gender_id', $preferences['gender_id']],
                    ['location', $preferences['location']]
                ])
                ->whereBetween('age', [$preferences['age_min'], $preferences['age_max']])
                ->whereNotIn('user_id', $likedUsers)
                ->whereNotIn('user_id', $dislikedUsers)
                ->inRandomOrder()
                ->first();

            return view('page.index', ['profile' => $profile, 'uri' => $uri]);
        }

        $profile = PublicProfile::with(['gender', 'image'])
            ->where('user_id', '!=', $userId)
            ->whereNotIn('user_id', $likedUsers)
            ->whereNotIn('user_id', $dislikedUsers)
            ->inRandomOrder()
            ->first();

        return view('page.index', ['profile' => $profile, 'uri' => $uri]);
    }

    public function show(string $userId)
    {
        $user = PublicProfile::where('id', $userId)->first();
        if ($userId == session()->get('loginId')) {
            return view('user.profile.profile', ['user' => $user]);
        }

        return view('user.profile.show', ['user' => $user]);
    }

    public function edit()
    {
        $user = PublicProfile::where('id', session('loginId'))->first();
        return view('user.profile.edit_profile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $userId = session()->get('loginId');
        PublicProfile::where('user_id', $userId)->update([
            'name' => $request->name,
            'gender_id' =>$request->gender,
            'location' => $request->location,
            'description' => $request->description
        ]);

        $path = request()->file('image')->store('images', ['disk'=>'public']);
        $imgSrc = "/storage/$path";
        Image::where('public_profile_id', $userId)->update([
            'image_path' => $imgSrc
            ]);

        $user = PublicProfile::where('user_id', $userId)->first();

        return view('user.profile.profile', ['user'=>$user]);
    }

}
