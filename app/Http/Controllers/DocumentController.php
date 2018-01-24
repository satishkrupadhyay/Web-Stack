<?php

namespace Jivoni\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function tnc()
    {
    	return view('terms');
    }

    public function privacy()
    {
    	return view('privacy');
    }

}
