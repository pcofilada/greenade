<?php

class MobileController extends BaseController {

	protected $layout 				= 'layouts.mobile.index';

	public function home()
	{
		$reports 				= Report::orderBy('created_at','DESC')->get();
		$this->layout->main 			= View::make('mobile.index')->with('reports',$reports);
	}
}