<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Your_daily_routine;
use App\Models\Loa_mission;
use App\Models\Loa_90_day_goals;
use App\Models\Loa_30_day_goals;
use App\Models\Loa_plan_of_day;
use App\Models\Loa_daily_planner;
use App\Models\Loa_how_was_day;
use App\Models\Subscription;
use App\Models\Planner;
use App\Models\Register;
use Carbon\Carbon;
use Validator;

class ApiController extends Controller
{
    //
    public function set_loa_daily_planner(Request $request){

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
            
            $c_date=date("Y-m-d");
            $info=Loa_daily_planner::where('user_id',$id)
                                ->whereDate('created_at','=',$c_date)
                                ->first();
            if($info){
                $user=Loa_daily_planner::where('user_id',$id)->first();
                $user->morning_visualisation=$request->morning_visualisation;
                $user->ninety_day_goal=$request->ninety_day_goal;
                $user->thirty_day_goal=$request->thirty_day_goal;
                $user->plan_for_today=$request->plan_for_today;
                $user->steal_one_hour=$request->steal_one_hour;
                $user->focus_160_minute=$request->focus_160_minute;
                $user->time_for_gratification=$request->time_for_gratification;
                $user->save();
                return response()->json([
                    "message"=>"data updated"
                ]);
            }
            else{

                $user=new Loa_daily_planner;
                $user->user_id=$request->user_id;
                $user->morning_visualisation=$request->morning_visualisation;
                $user->ninety_day_goal=$request->ninety_day_goal;
                $user->thirty_day_goal=$request->thirty_day_goal;
                $user->plan_for_today=$request->plan_for_today;
                $user->steal_one_hour=$request->steal_one_hour;
                $user->focus_160_minute=$request->focus_160_minute;
                $user->time_for_gratification=$request->time_for_gratification;
                $user->save();
                return response()->json([
                    "message"=>"data inserted"
                ]);
            }
            


        }
        

    }

    public function get_plans(Request $request){
        

        $validatedData=Validator::make($request->all(),[
            "planner_id"=>"required"
        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail"
            ]);
        }
        else{
            $plan_id=$request->planner_id;
            $plans=Subscription::where('planner_id',$plan_id)->get();
            return $plans;


        }

    }

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


    public function get_loa_plan_of_day(Request $request){

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
            $info=Loa_plan_of_day::where('id',$id)->first();
            return $info;


        }

    }


    
    public function get_loa_daily_planner(Request $request){

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
            $info=Loa_daily_planner::where('id',$id)->first();
            return $info;


        }

    }


    public function get_loa_how_was_day(Request $request){

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
            $info=Loa_how_was_day::where('id',$id)->first();
            return $info;


        }

    }

    public function planner_list(){

        $plan=Planner::select('id','plan_name')->get();
        return $plan;

    }

    public function set_subscription(Request $request){
        
        $validatedData=Validator::make($request->all(),[
            "user_id"=>"required",
            "planner"=>"required",
            "subscription"=>"required",
            
        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail"
            ]);
        }
        else{
            $id=$request->user_id;
            $user=Register::find($id);
            $user->planner=$request->planner;
            $user->subscription=$request->subscription;
            $user->subscription_date=Carbon::now()->toDateTimeString();
            $user->status="active";
            $user->save();
            return response()->json([
                "message"=>"Your plan is activated"
            ]);


        }


    }












}
