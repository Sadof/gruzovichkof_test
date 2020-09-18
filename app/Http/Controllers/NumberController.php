<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Number;

class NumberController extends Controller
{

	public function retrive($id){
		$number = Number::find($id);
		return $number;
	}

	public function post(Request $request) {
		switch ($request->input('submit')) {
			case 'new number':
				$number = Number::createRand();
				$number['new'] = true;
				return view('index', compact('number'));
				break;
			case "search":
				$id = $request->input('ID');
				if(!empty($id)){ // it's can be done on client side by JS.
					$number = self::retrive($id);
					if(!empty($number)){
						error_log($number);
						return view('index', compact('number'));
					} else {
						$error = "No nubmer with this ID.";
						return view('index', compact('error'));
					}
				} else {
					return redirect("/");
				}
				break;
		}
	}


}
