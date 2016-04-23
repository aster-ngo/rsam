<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function index(){
		$list = User::all();

		$list = json_encode($list);

		return son_encode($"ok");
		// if (Request::ajax()){

	 //        // $text = \Request::input('textkey');
	 //        // $users = DB::table('datalists')->where('city', 'like', $text.'%')->take(10)->get();
	 //        $users = User::all();
	 //        $users = json_encode($users);

	 //        return $users;
	 //    }
	}

}
