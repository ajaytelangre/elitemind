<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loa_gratification;
use App\Models\Loa_unique_things;
use Carbon\Carbon;
use Validator;

class NewApiController extends Controller
{
    

    public function get_loa_gratification(Request $request){
        

        $validatedData=Validator::make($request->all(),[
            "register_id"=>"required"
        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail"
            ]);
        }
        else{
            $id=$request->register_id;
            $gratification=Loa_gratification::where('register_id',$id)->get();
            return $gratification;


        }
       
    }


    public function get_loa_unique_things(Request $request){
        

        $validatedData=Validator::make($request->all(),[
            "register_id"=>"required"
        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail"
            ]);
        }
        else{
            $id=$request->register_id;
            $uniqthings=Loa_unique_things::where('register_id',$id)->get();
            return $uniqthings;


        }
       
    }

}
