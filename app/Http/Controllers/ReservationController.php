<?php

namespace Cedricitos\Http\Controllers;

use Illuminate\Http\Request;
use Cedricitos\Reservation;
use Cedricitos\Event;
use Auth;


class ReservationController extends Controller
{

    public function index(){

    	$reserve = new Reservation;

    	$reservation = $reserve->wherein('status',[1])->orderby('id','desc')->get(); 

       return view('reservation.reservation.index', compact('reservation'));
    }

    public function client(){

    	$reserve = new Reservation;
    	$event = new Event;

    	$user = Auth::user();

    	$reservation = $reserve->wherein('status',[1])->orderby('id','desc')->get(); 

    	$event_data = $event->wherein('status',[1])->get(); 

    	foreach ($event_data as $key => $value) {
    		$event_data_pluck[$value['id']] =  $value['name'];
    	}


    	$events = [];

    	$events[] = \Calendar::event(
    		"Event one",
    		true,
    		'2017-01-02 11:00',
    		'2017-01-06 11:00',
    		0
    	);

    	$events[] = \Calendar::event(
    		"Event two",
    		true,
    		'2017-02-02 11:00',
    		'2017-02-06 05:00',
    		0
    	);

    	$calendar = \Calendar::addEvents($events)
    		->setOptions([
    			'firstDay' => 1
    	])->setCallbacks([]);

       return view('reservation.reservation.client', compact('reservation','event_data_pluck','event_data','user','calendar'));
    }


   	public function create(Request $request){

   		$reserve = new Reservation;

   		$user = Auth::user();
		
		if(!empty($request->input())){

			// $startdate = date("Y-m-d", strtotime($request->input("start_date"))) ;
			// $starttime = date("hh:MM", strtotime($request->input("start_time")));

			$startdate = date("Y-m-d H:i:s", strtotime($request->input("start_date") . $request->input("start_time")));
			$enddate = date("Y-m-d H:i:s", strtotime($request->input("end_date") . $request->input("end_time")));
			$foodtaste =  date('Y-m-d H:i:s',(strtotime ( '-2 day' , strtotime ( $startdate) ) ));
			
			$reserve['user_id'] = $user->id;
			$reserve['status'] = $request->input("status");
			$reserve['event_id'] =$request->input("event_id");
			$reserve['event_date_from'] = $startdate;
			$reserve['event_date_to'] = $enddate;
			$reserve['food_taste_date'] =$foodtaste;
			$reserve->save();

		return back();

		}
       
    }

    public function update(Request $request){

   		$food = new Food;
		
		if(!empty($request->input())){

			$values=array('name'=> $request->input("name"),
				'price'=>$request->input("price"),
				'status'=>$request->input("status"),
				'category_id'=>$request->input("category_id"),
				);

			$food->whereIn('id',[$request->input("id")])->update($values);

		return back();

		}

    }

    public function delete(Request $request){

		$food = new Food;
		
		if(!empty($request->input())){

			$values=array(
				'status'=>0,		
				);

			$food->whereIn('id',[$request->input("id")])->update($values);

		return back();

		}
    }
}
