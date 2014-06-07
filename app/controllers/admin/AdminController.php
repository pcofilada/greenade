<?php

class AdminController extends \BaseController {
	protected $layout 		= 'layout.admin.index';

	public function showLogin(){
		return View::make('layouts.admin.login.index');
	}

	public function doLogin(){
		$rules 				= array(
							'email'    => 'required',
							'password' => 'required'
						);
		$validator 			= Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('/admin/login')->withErrors($validator)->withInput();
		}else{

			$userdata 		= array(
							'email' 	=> Input::get('email'),
							'password' 	=> Input::get('password')
						); 

			$user 			= Admin::where('email', $userdata['email'])->first();
			if($user && Hash::check($userdata['password'],$user->password)){
				Session::put('admin', $user);
				return Redirect::to('/admin');
			} else {	 	

				return Redirect::to('/admin/login')->withErrors('Wrong Username/Password')->withInput();
			}

		}
	}
}