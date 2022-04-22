<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\PublicProfile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function confirmAge(): View|Factory|Application
    {
        return view('user.registration.confirm_age');
    }

    public function validateNewUser()
    {
        $age = Carbon::parse(request('birthday'))->age;

        if ($age >= 18) {
            return view('user.profile.create', ['age' => $age]);

        } else {
            var_dump('you must be older than 18 || email already used');
        }
    }

    public function storeData(Request $request)
    {
        $path = request()->file('image')->store('images', ['disk'=>'public']);
        $imgSrc = "/storage/$path";

        $user = new User();
        $user->email = $request->email;
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();

        $profile = new PublicProfile();
        $profile->user_id = $user->id;
        $profile->name = $request->name;
        $profile->age = $request->age;
        $profile->location = $request->location;
        $profile->description = $request->description;
        $profile->gender_id = $request->gender;
        $profile->save();

        $image = new Image();
        $image->public_profile_id = $user->id;
        $image->image_path = $imgSrc;
        $image->save();

        return redirect('/');

    }
}
