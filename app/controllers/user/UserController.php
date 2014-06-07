<?php

class UserController extends BaseController {

	protected $layout = 'layouts.front.index';

	public function home($id)
	{
		$user 			=  User::where('id','=',$id);

	}
}