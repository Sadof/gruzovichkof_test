<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Number;
use Validator;


class NumberController extends BaseController{

	public function create(){
		$number = Number::createRand();
		unset($number['created_at']);
		unset($number['updated_at']);
		return $this->sendResponse($number->toArray()); 
	}
	public function retrive(Request $request){
		$id = $request->input('id');
		// if (empty($id)){
		// 	$number = Number::createRand();
		// 	return $this->sendResponse($number->toArray()); 
		// } else {
		if (is_numeric($id)){
			$number = Number::find($id);
			if (!empty($number)){
				unset($number['id']);
				unset($number['updated_at']);
				return $this->sendResponse($number->toArray()); 
			}
			return $this->sendError($error='No number with this ID');
		} 
		return $this->sendError($error='ID can only be numeric');
		// } 
		
	}
	public function show($id){
		if (is_numeric($id)){
			$number = Number::find($id);
			if (!empty($number)){
				unset($number['id']);
				unset($number['updated_at']);
				return $this->sendResponse($number->toArray()); 
			}
			return $this->sendError($error='No number with this ID');
		} 
		return $this->sendError($error='ID can only be numeric');
	}
}