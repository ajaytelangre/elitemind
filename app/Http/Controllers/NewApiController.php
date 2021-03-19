<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Loa_gratification;
use App\Models\Loa_unique_things;
use App\Models\Loa_lesson_of_day;
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

            $register=Register::select('month_start','month_end')
            ->where('id',$id)
            ->first();

            $month_start=$register->month_start;
            $month_end=$register->month_end;
          
            $gratification=Loa_gratification::where('register_id',$id)
                                         ->whereBetween('created', [$month_start, $month_end]) 
                                         ->get();
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

            $register=Register::select('month_start','month_end')
            ->where('id',$id)
            ->first();

            $month_start=$register->month_start;
            $month_end=$register->month_end;
          
            
            $uniqthings=Loa_unique_things::where('register_id',$id)
                                        ->whereBetween('created', [$month_start, $month_end]) 
                                        ->get();
            return $uniqthings;


        }
       
    }


    public function get_loa_lesson_of_day(Request $request){
        

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

            $register=Register::select('month_start','month_end')
            ->where('id',$id)
            ->first();

            $month_start=$register->month_start;
            $month_end=$register->month_end;
          

            $lessonofday=Loa_lesson_of_day::where('register_id',$id)
                                                ->whereBetween('created', [$month_start, $month_end]) 
                                                ->get();
            return $lessonofday;


        }
       
    }

}
