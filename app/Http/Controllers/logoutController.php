<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Session;
class logoutController extends Controller
{
    public function getLogout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
}
