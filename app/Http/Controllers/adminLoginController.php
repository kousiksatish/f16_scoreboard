<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller {

	public function login()
	{
		if(Session::has('user_name'))
			return Redirect::to('/admin/dashboard');
		else
			return view('adminLogin');
    }

    public function auth(Request $request)
	{
			$username=$request->get('email'); 
			$password=$request->get('password');
			$password = sha1($password);
			echo($username.' '.$password);
			$result = DB::select('select * from users where email = ? and password = ?', [$username,$password]);
			
			if(count($result)>0) $valid = 1;
			else $valid = 0;

			if($valid == 1)
			{
				Session::put('user_name',$result[0]->name);
				return Redirect::to('/admin/dashboard');
			}
			else
			{
				return Redirect::to('admin/login')->with('message', 'Incorrect Username or Password');
			}
	}


	public function logout()
	{
		if(Session::has('user_name'))
		{
			Session::flush();		 
			return Redirect::to('admin')->with('message', 'Successfully Logged out.');
		}
		else
		{
			Session::flush();
			return Redirect::to('/');
		}	
    }

}
