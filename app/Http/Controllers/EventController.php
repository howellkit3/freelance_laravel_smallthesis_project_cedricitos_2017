<?php

namespace Cedricitos\Http\Controllers;

use Illuminate\Http\Request;
use Cedricitos\Event;


class EventController extends Controller
{

    public function index(){

    	$Event = new Event;
    	$event_data = $Event->wherein('status',[1])->orderby('id','desc')->get(); 
    	return view('settings.event.index', compact('event_data'));

    }

   	public function create(Request $request){

   		$Event = new Event;
		
		if(!empty($request->input())){

			$Event['name'] = $request->input("name");
			$Event->save();

		return back();

		}
       
    }

    public function update(Request $request){

   		$Event = new Event;
		
		if(!empty($request->input())){

			$values=array('name'=> $request->input("name"),
				);

			$Event->whereIn('id',[$request->input("id")])->update($values);

		return back();

		}

    }

    public function delete(Request $request){

		$Event = new Event;
		
		if(!empty($request->input())){

			$values=array(
				'status'=>0,		
				);

			$Event->whereIn('id',[$request->input("id")])->update($values);

		return back();

		}
    }
}
