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
use App\Models\User_subscription;
use App\Models\Register;
use Carbon\Carbon;
use Validator;

class ApiController extends Controller
{
    //
    public function test(){
        return "hello";
    }


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
            $info=Loa_plan_of_day::where('register_id',$id)->first();
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
            $register=Register::select('month_start','month_end')
                                ->where('id',$id)
                                ->first();

            $month_start=$register->month_start;
            $month_end=$register->month_end;
          

            $info=Loa_daily_planner::where('user_id',$id)
                            ->whereBetween('created_at', [$month_start, $month_end])
                            ->get();
            $morning_visualization=[];
            $ninety_day_goal=[];
            $thirty_day_goal=[];
            $plan_for_today=[];
            $steal_one_hour=[];
            $focus_160_minute=[];
            $time_for_gratification=[];
            foreach($info as $i)
            {
                array_push($morning_visualization,$i->morning_visualisation);
                array_push($ninety_day_goal,$i->ninety_day_goal);
                array_push($thirty_day_goal,$i->thirty_day_goal);
                array_push($plan_for_today,$i->plan_for_today);
                array_push($steal_one_hour,$i->steal_one_hour);
                array_push($focus_160_minute,$i->focus_160_minute);
                array_push($time_for_gratification,$i->time_for_gratification);
            }
            $m_vis_count = array_count_values($morning_visualization);
            if(in_array('y',$morning_visualization)){
                $m_vis_y_count=$m_vis_count['y'];
            }
            else{
                $m_vis_y_count=0;
            }
            $m_vis_percent=round($this->percent($m_vis_y_count), 2);


            $ninety_count = array_count_values($ninety_day_goal); 
           if(in_array('y',$ninety_day_goal)){
            $ninety_y_count=$ninety_count['y'];
           }
           else{
            $ninety_y_count=0;
           }
            $ninety_percent=round($this->percent($ninety_y_count), 2);


            $thirty_count = array_count_values($thirty_day_goal);
            if(in_array('y',$thirty_day_goal)){
                $thirty_y_count=$thirty_count['y'];
            }
            else{
                $thirty_y_count=0;
            }
            $thirty_percent=round($this->percent($thirty_y_count), 2);

            
            $today_count = array_count_values($plan_for_today);
            if(in_array('y',$plan_for_today)){
                $today_y_count=$today_count['y'];
            }
            else{
                $today_y_count=0;
            }
            $today_percent=round($this->percent($today_y_count), 2);



            $steal_count = array_count_values($steal_one_hour);
            if(in_array('y',$steal_one_hour)){
                $steal_y_count=$steal_count['y'];
            }
            else{
                $steal_y_count=0;
            }
            $steal_percent=round($this->percent($steal_y_count), 2);


            
            $focus_count = array_count_values($focus_160_minute);
            if(in_array('y',$focus_160_minute)){
                $focus_y_count=$focus_count['y'];
            }
            else{
                $focus_y_count=0;
            }
            $focus_percent=round($this->percent($focus_y_count), 2);


            $time_count = array_count_values($time_for_gratification);
            if(in_array('y',$time_for_gratification)){
                $time_y_count=$time_count['y'];
            }
            else{
                $time_y_count=0;
            }
            $time_percent=round($this->percent($time_y_count), 2);



            return response()->json([
                "morning_visualization"=>$m_vis_percent,
                "ninety_day_goal"=>$ninety_percent,
                "thirty_day_goal"=>$thirty_percent,
                "plan_for_today"=>$today_percent,
                "steal_one_hour"=>$steal_percent,
                "focus_160_minute"=>$focus_percent,
                "time_for_gratification"=>$time_percent
            ]);
         


        }

    }

    public function percent($y){
        $per=($y*100)/30;
        return $per;
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
            "order_id"=>"required",
            "payment_id"=>"required",
            "payment_method"=>"required",
            "amount"=>"required"
            
        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail"
            ]);
        }
        else{
            $id=$request->user_id;
            $user_sub=new User_subscription;
            $user_sub->user_id=$id;
            $user_sub->subscriptions_id=$request->subscription;
            $user_sub->amount=$request->amount;
            $user_sub->order_id=$request->order_id;
            $user_sub->payment_id=$request->payment_id;
            $user_sub->payment_method=$request->payment_method;
            $user_sub->save();

           
            $user=Register::find($id);
            $user->planner=$request->planner;
            $user->subscription=$request->subscription;
            $user->user_sub_id=$user_sub->id;
            $user->subscription_date=Carbon::now()->toDateTimeString();
            $user->month_start=Carbon::now()->toDateTimeString();
            $user->month_end=Carbon::now()->addDays(30);
            $user->status="active";
            $user->save();

          
            return response()->json([
                "message"=>"Your plan is activated"
            ]);


        }


    }












}
