<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Your_daily_routine;
use Validator;

class ApiController extends Controller
{
    //

    public function get_daily_routine(Request $request){

        $validatedData=Validator::make($request->all(),[
            "user_id"=>"required"
        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail"
            ]);
        }
        else{
            $id=$request->user_id;
            $info=Your_daily_routine::where('id',$id)->first();
            return $info;


        }


    }
}
