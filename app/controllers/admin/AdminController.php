<?php

class AdminController extends \BaseController {
	protected $layout 		= 'layout.admin.index';

	public function showLogin(){
		return View::make('layouts.admin.login.index');
	}
}