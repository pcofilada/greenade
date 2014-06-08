<?php

class MobileController extends BaseController {

	protected $layout 				= 'layouts.mobile.index';

	public function home()
	{
		$this->layout->main 			= View::make('mobile.index');
	}
}