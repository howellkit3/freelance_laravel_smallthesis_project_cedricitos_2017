<?php

namespace Cedricitos\Http\Controllers;

use Illuminate\Http\Request;
use Cedricitos\Food;
use Cedricitos\FoodCategory;


class FoodController extends Controller
{

    public function index(){

    	$food = new Food;
    	$foodCategory = new FoodCategory;

    	$food_data = $food->wherein('status',[1])->orderby('id','desc')->get(); 
    	$food_category = $foodCategory->wherein('status',[1])->get(); 

    	foreach ($food_category as $key => $value) {
    		$category_pluck[$value['id']] =  $value['name'];
    	}

       return view('settings.food.index', compact('food_data','food_category','category_pluck'));
    }

   	public function create(Request $request){

   		$food = new Food;
		
		if(!empty($request->input())){

			$food['name'] = $request->input("name");
			$food['price'] =$request->input("price");
			$food['status'] =$request->input("status");
			$food['category_id'] =$request->input("category_id");
		
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
