<?php

class UserController extends BaseController {

	protected $layout = 'layouts.front.index';

	public function home($id)
	{
		$reports 			= Report::all();
		$user 				=  User::where('id','=',$id);
		$this->layout->sidebar 	= View::make('layouts.front.sidebar.user');
		$this->layout->main 		= View::make('front.index')->with('user',$user)->with('reports',$reports);

	}

	public function report()
	{

		$session 			= Session::get('user');
		$rules 				= array(
							'title' 			=> 'required',
							'description'		=> 'required',
							'image' 		=> 'required',
							'lat' 			=> 'required',
							'long' 			=> 'required'
							);

		$validator 			= Validator::make(Input::all(),$rules);

		if($validator->fails()){
			return Redirect::to('/')->withErrors($validator)->withInput();
		}else{
			$image = array();
			if(Input::hasFile('image[]') &&  $file = Input::file('image[]')){
				foreach (Input::file('image[]') as $file) {
					$filename 		= str_random(8) . '_' . $file->getClientOriginalName();
					$destinationPath 	= public_path().'/reports/'.$session->name;
					$upload_success 	= $file->move($destinationPath, $filename);
					if($upload_success){
						array_push($image,'/reports/'.$session->name.$filename);
					}
				}
			}
		
		$report 			= new Report;
		$report->user			= $session->id;
		$report->title 			= e(Input::get('title'));
		$report->description 		= e(Input::get('description'));
		$report->image 		= $image;
		$report->lat 			= Input::get('lat');
		$report->long 			= Input::get('long');
		$report->save();

		Session::flash('success','Report created!');
		return Redirect::to('/user/'.$session->name);
		}
	}
}