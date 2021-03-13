<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Your_daily_routine;
use App\Models\Loa_mission;
use App\Models\Loa_90_day_goals;
use App\Models\Loa_30_day_goals;
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

    public function get_mission(Request $request){

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
            $info=Loa_mission::where('id',$id)->first();
            return $info;


        }




    }


    
    public function get_loa_90(Request $request){

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
            $info=Loa_90_day_goals::where('id',$id)->first();
            return $info;


        }

    }


    public function get_loa_30(Request $request){

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
            $info=Loa_30_day_goals::where('id',$id)->first();
            return $info;


        }

    }


}
