<?php

namespace Cedricitos\Http\Controllers;

use Illuminate\Http\Request;
use Cedricitos\FoodCategory;


class FoodCategoryController extends Controller
{

    public function index(){

    	$FoodCategory = new FoodCategory;

    	$food_category_data = $FoodCategory->wherein('status',[1])->orderby('id','desc')->get(); 

       return view('settings.foodcategory.index', compact('food_category_data'));
    }

   	public function create(Request $request){

   		$FoodCategory = new FoodCategory;
		
		if(!empty($request->input())){

			$FoodCategory['name'] = $request->input("name");
			$FoodCategory->save();

		return back();

		}
       
    }

    public function update(Request $request){

   		$FoodCategory = new FoodCategory;
		
		if(!empty($request->input())){

			$values=array('name'=> $request->input("name"),
				);

			$FoodCategory->whereIn('id',[$request->input("id")])->update($values);

		return back();

		}

    }

    public function delete(Request $request){

		$FoodCategory = new FoodCategory;
		
		if(!empty($request->input())){

			$values=array(
				'status'=>0,		
				);

			$FoodCategory->whereIn('id',[$request->input("id")])->update($values);

		return back();

		}
    }
}
