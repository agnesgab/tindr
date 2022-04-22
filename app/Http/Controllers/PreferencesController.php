<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{
    public function preferences()
    {
        return view('page.preferences');
    }

    public function setPreferences(Request $request)
    {
        $userId = session('loginId');
        $existingPreference = Preference::where('user_id', $userId)->first();

        if($existingPreference !== null){
            Preference::where('user_id', $userId)
                ->update([
                    'gender_id' => $request->gender,
                    'location' => $request->location,
                    'age_min' => $request->min,
                    'age_max' => $request->max
                ]);
            return redirect('/home');
        }

        $preference = new Preference();
        $preference->user_id = $userId;
        $preference->gender_id = $request->gender;
        $preference->location = $request->location;
        $preference->age_min = $request->min;
        $preference->age_max = $request->max;
        $preference->save();

        return redirect('/home');

    }
}
