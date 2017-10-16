<?php
namespace Jivoni\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Jivoni\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
       
    }
    public function showLoginForm()
    {
        return view('auth.pharmlogin');
    }
    public function login(Request $request)
    {
        //return view('auth.pharmlogin');
        //validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //Attempt to log the user in
        if (Auth::guard('admin')->Attempt(['store_email' =>$request->email, 'password'=> $request->password])) {
            
           
            return redirect()->intended(route('admin.home'));
        }
        
        return redirect()->back();
    }
    
    
}