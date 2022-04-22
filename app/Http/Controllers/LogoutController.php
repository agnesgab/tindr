<?php

namespace App\Http\Controllers;

class LogoutController extends Controller
{
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
