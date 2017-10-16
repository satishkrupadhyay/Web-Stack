<?php

namespace Jivoni\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show()
    {
    	$Images = Image::all();
    	return view('display', ['Images' => $Images]);
    }
}
