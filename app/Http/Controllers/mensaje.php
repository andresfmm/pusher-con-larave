<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TestEvent;

class mensaje extends Controller
{
    public function noti(Request $request){
    	if ($request->ajax()) {

    	  $data = $request->all();
          return response()->json(event(new TestEvent($data)));
    	}
    }
}
