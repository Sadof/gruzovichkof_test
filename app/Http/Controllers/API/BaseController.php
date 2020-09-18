<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller{

	public function sendResponse($result){
		$response = [
			'success' => true,
			'data' => $result,
		];

		return response() -> json($response, 200);
	}

	public function sendError($error, $errorMessage = [], $errorCode = 404){
		$response = [
			'success' => false,
			'message' => $error,
		];

		if (!empty($errorMessage)){
			$response['data'] = $errorMessage;
		}

		return response() -> json($response, $errorCode);
	}
}
