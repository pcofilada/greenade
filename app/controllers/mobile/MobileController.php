<?php

class MobileController extends BaseController {

	protected $layout 				= 'layouts.mobile.index';

	public function home()
	{
		$reports 				= Report::orderBy('created_at','DESC')->get();
		$this->layout->main 			= View::make('mobile.index')->with('reports',$reports);
	}

	public function login()
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
				return Redirect::to('/')->withErrors('Wrong Username/Password')->withInput();
			}
		}
	}
}