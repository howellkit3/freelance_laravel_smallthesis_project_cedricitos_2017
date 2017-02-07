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

       return view('reservation.reservation.client', compact('reservation','event_data_pluck','event_data','user'));
    }


   	public function create(Request $request){

   		$reserve = new Reservation;

   		$user = Auth::user();

   		//print_r('<pre>'); print_r($user->id); print_r('</pre>'); exit; 
   		print_r('<pre>'); print_r($request->input()); print_r('</pre>'); exit; 
		
		if(!empty($request->input())){

			$reserve['user_id'] = $user->id;
			$reserve['status'] = $request->input("status");
			$reserve['status'] =$request->input("status");
			$reserve['event_id'] =$request->input("event_id");
		
			$food->save();

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
