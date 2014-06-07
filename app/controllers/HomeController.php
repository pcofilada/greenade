<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.front.index';
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
		$session 				= Session::get('user');
		$user 					= User::where('id','=',$session->id);
		$this->layout->sidebar 		= View::make('layouts.front.sidebar.trending');
		$this->layout->main 			= View::make('front.index')->with('user',$user);
	}

	public function doSignup()
	{
		$rules 			= array(
						'name' 		=> 'required',
						'mobile' 	=> 'min:11 | max:11',
						'email' 		=> 'email | unique:users',
						'password' 	=> 'required | confirmed'
						);

		$validator 			= Validator::make(Input::all(),$rules);

		if($validator->fails()){
			return Redirect::to('/');
		}else{
			$user			= new User;
			$user->name 		= e(Input::get('name'));
			$user->mobile 	= e(Input::get('mobile'));
			$user->email 		= e(Input::get('email'));
			$user->password 	= Hash::make(Input::get('password'));
			$user->save();

			return "Save!";
		}
	}

	public function doLogin()
	{
		$rules 				= array(
							'email' => 'required',
							'password' => 'required'
							);

		$validator 			= Validator::make(Input::all(),$rules);

		if($validator->fails()){
			return Redirect::to('/');
		}else{
			$userdata 		= array(
							'email' 	=> Input::get('email'),
							'password' 	=> Input::get('password')
							);

			$user 			= User::where('email', $userdata['email'])->first();
			if($user && Hash::check($userdata['password'],$user->password)){
				Session::put('user',$user);
				return Redirect::to('/');
			}else{
				return "error";
				dd(Session::all());
			}
		}
	}
}
