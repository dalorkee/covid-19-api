<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Covid;
use Log;

class CovidController extends Controller
{
	public function __construct() {
		//
	}

	public function getData() {
		/*
		try {
			return $this->success('Success');
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		*/
		$data = Covid::select('id', 'sat_id')->where('id', '=', 1)->get();
		dd($data);
		if (count($data) > 0) {
			return $this->success($data[0]->sat_id);
		} else {
			return $this->success('sad');
		}
	}

	public function getDataFromId(Request $request) {
		try {
			$data = Covid::select('id', 'sat_id')->where('id', '=', $request->id)->get();
			if (count($data) > 0) {
				return $this->success($data[0]->sat_id);
			} else {
				return $this->success('sad');
			}
		} catch (Exception $e) {
			Log::error($e->getMessage);
		}
	}

	public function store(Request $request) {
		return $this->success('Store');
	}

	public function update(Request $request) {
		return $this->success('update');
	}

	public function destroy(Request $request) {
		return $this->success('destroy');
	}

	protected function success($response) {
		return response()->json(['status' => 'success', 'data' => $response],200)
			->header('Access-Control-Allow-Origin', '*')
			->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
	}
}
