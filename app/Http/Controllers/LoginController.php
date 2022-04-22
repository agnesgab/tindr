<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Session;

class LoginController extends Controller {

    public function login(Request $request)
    {
        $user = DB::table('users')
            ->where('email', \request('email'))
            ->first();

        if($user !== null){
            if(Hash::check($request['password'], $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('home');

            } else {
                return redirect('/');
            }
        } else {
            //var_dump('you dont exist, gotta register first');
            return redirect('/');
        }

    }

}
