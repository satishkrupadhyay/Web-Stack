<?php

namespace Jivoni\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Session;
class logoutController extends Controller
{
    public function getLogout(){
        Auth:admin::logout();
        Session::flush();
        return Redirect::to('/');
    }

}
