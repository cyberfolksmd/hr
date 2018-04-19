<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{

	public function index()
	{
		return view('login');
	}

	public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        return redirect()->intended('auth')->with('message', 'Dados Incorretos');
    }

    public function logout(){
    	auth()->logout();
    	return redirect(action('LoginController@index'));
    }
}