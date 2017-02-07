<?php

namespace Cedricitos\Http\Controllers;

use Illuminate\Http\Request;
use Cedricitos\Package;
use Cedricitos\Food;

class PackageController extends Controller
{

    public function index(){

    	$Package = new Package;
    	$Food = new Food;

    	$package_data = $Package->wherein('status',[1])->orderby('id','desc')->get(); 

    	foreach ($package_data as $key => $value) {

    		$package_data[$key]['food'] = json_decode($value['food']);
    		
    	}

    	$food_data = $Food->wherein('status',[1])->pluck('name','id'); 

       return view('settings.Package.index', compact('package_data','food_data'));
    }

   	public function create(Request $request){

   		$Package = new Package;

   		$food = json_encode($request->input("food"));


	
		if(!empty($request->input())){

			$Package['name'] = $request->input("name");
			$Package['price_per_pax'] = $request->input("price_per_pax");
			$Package['food'] = $food;
			$Package['minimum'] = $request->input("minimum");
			$Package->save();

		return back();

		}
       
    }

    public function update(Request $request){

   		$Package = new Package;

   		$food = json_encode($request->input("food"));
		
		if($food ==  null){

			$values=array('name'=> $request->input("name"),
				'minimum'=> $request->input("minimum"),
				'price_per_pax'=> $request->input("price_per_pax"),
				'food'=> $food,
				);

			$Package->whereIn('id',[$request->input("id")])->update($values);

		}

		return back();

    }

    public function delete(Request $request){

		$Package = new Package;
		
		if(!empty($request->input())){

			$values=array(
				'status'=>0,		
				);

			$Package->whereIn('id',[$request->input("id")])->update($values);

		return back();

		}
    }
}
