<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class AuthController extends Controller
{

    public function index() {
        return view('auth.login');
    }  

    public function registration() {
        return view('auth.registration');
    }
    
    public function postLogin(Request $request) {
      request()->validate([
      'username' => 'required',
      'password' => 'required',
      ]);
      $credentials = $request->only('username', 'password');
      if (Auth::attempt($credentials)) {
          return redirect()->intended('dashboard');
      }
      return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request) {  
        request()->validate([
        'username' => 'required|unique:users',
        'fullname' => 'required',
        'phone' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect("dashboard")->with('status', 'Profile updated!');
    }
    public function dashboard() {
      if(Auth::check()){
        return view('dashboard');
      }
      return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

	public function create(array $data) {
	  return User::create([ 
      'username' => $data['username'],
      'fullname' => $data['fullname'],
      'phone' => $data['phone'],
	    'email' => $data['email'],
	    'password' => Hash::make($data['password'])
	  ]);
	}
	
	public function logout() {
    Session::flush();
    Auth::logout();
    return Redirect('login');
  }
}