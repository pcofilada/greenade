<?php

class UserController extends BaseController {

	protected $layout = 'layouts.front.index';

	public function home($id)
	{
		$user 				=  User::where('id','=',$id);
		$this->layout->sidebar 	= View::make('layouts.front.sidebar.user');
		$this->layout->main 		= View::make('front.index');

	}
}