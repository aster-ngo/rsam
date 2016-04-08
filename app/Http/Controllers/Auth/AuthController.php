<?php namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;	
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLogin(){
		return new RedirectResponse(url('/index.html'));
	}

	public function postLogin(LoginRequest $request){
		// return "Login success";
		
		if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
			if(Auth::user()->role == 1){
				return new RedirectResponse(url('/home'));
			}else{
				return new RedirectResponse(url('/admin'));
			}
		}else {
			// return "Login error";
			return new RedirectResponse(url('/index.html'));
		}
	}

	public function getLogout(){
		Auth::logout();
		return new RedirectResponse(url('/index.html'));
	}

	public function postRegister(RegisterRequest $request){

		if (User::where('email', '=', $request->email)->count() <= 0) {

			User::create([
				'name' => $request->name,
				'email' => $request->email,
				'password' => bcrypt($request->password),
				'role' => $request->role
			]);

			return new RedirectResponse(url('/home'));
		}
		return new RedirectResponse(url('/index.html'));
	}
}
