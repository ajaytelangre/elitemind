<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Stud_brainstorming;
use App\Models\Stud_celebration;
use App\Models\Stud_environment;
use App\Models\Stud_intellectual_break;
use App\Models\Stud_learn_and_teach;
use App\Models\Stud_physique;
use App\Models\Stud_rule_of_three;
use App\Models\Stud_daily_planner;
use Carbon\Carbon;
use Validator;

class StudentApiController extends Controller
{
    
    public function insert_elite_stud_petals(Request $request){

        $validatedData=Validator::make($request->all(),[
            "user_id"=>"required",
           

        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail",
                "status"=>"false"
            ]);
        }
        else{
            $id=$request->user_id;
            $c_date=date("Y-m-d");

            // Stud_brainstorming
            $stud_brainstorming=Stud_brainstorming::where('user_id',$id)
                                ->whereDate('created_at','=',$c_date)
                                ->first();

            if($stud_brainstorming){
                $brainstorming=Stud_brainstorming::where('user_id',$id)->first();
            }
            else{
                $brainstorming=new Stud_brainstorming;
                $brainstorming->user_id=$request->user_id;
               
            }
            // Stud_celebration
            $stud_celebration=Stud_celebration::where('user_id',$id)
                                ->whereDate('created_at','=',$c_date)
                                ->first();
           

            if($stud_celebration){
                $celebration=Stud_celebration::where('user_id',$id)->first();
            }
            else{
                $celebration=new Stud_celebration;
                $celebration->user_id=$request->user_id;
               
            }

              // Stud_environment
              $stud_environment=Stud_environment::where('user_id',$id)
              ->whereDate('created_at','=',$c_date)
              ->first();


            if($stud_environment){
            $environment=Stud_environment::where('user_id',$id)->first();
            }
            else{
            $environment=new Stud_environment;
            $environment->user_id=$request->user_id;

            }

             // Stud_intellectual_break
             $stud_intellectual_break=Stud_intellectual_break::where('user_id',$id)
             ->whereDate('created_at','=',$c_date)
             ->first();


           if($stud_intellectual_break){
           $intellectual=Stud_intellectual_break::where('user_id',$id)->first();
           }
           else{
           $intellectual=new Stud_intellectual_break;
           $intellectual->user_id=$request->user_id;

           }

           
             // Stud_learn_and_teach
             $stud_learn_and_teach=Stud_learn_and_teach::where('user_id',$id)
             ->whereDate('created_at','=',$c_date)
             ->first();


           if($stud_learn_and_teach){
           $learn=Stud_learn_and_teach::where('user_id',$id)->first();
           }
           else{
           $learn=new Stud_learn_and_teach;
           $learn->user_id=$request->user_id;

           }
             // Stud_physique
             $stud_physique=Stud_physique::where('user_id',$id)
             ->whereDate('created_at','=',$c_date)
             ->first();


           if($stud_physique){
           $physique=Stud_physique::where('user_id',$id)->first();
           }
           else{
           $physique=new Stud_physique;
           $physique->user_id=$request->user_id;

           }
             // Stud_rule_of_three
             $stud_rule_of_three=Stud_rule_of_three::where('user_id',$id)
             ->whereDate('created_at','=',$c_date)
             ->first();


           if($stud_rule_of_three){
           $rule=Stud_rule_of_three::where('user_id',$id)->first();
           }
           else{
           $rule=new Stud_rule_of_three;
           $rule->user_id=$request->user_id;
         }

         $todaysDate  = Carbon::now()->toDateTimeString();

            //    brainstorming
            $brainstorming->brainstormingsession =$request->brainstormingsession;
            $brainstorming->getanswers =$request->getanswers;
            $brainstorming->review =$request->review;
            $brainstorming->practice =$request->practice;
            $brainstorming->created_at =$todaysDate;
            $brainstorming->save();

            //   stud_celebrate
            $celebration->party_time =$request->party_time;
            $celebration->music =$request->music;
            $celebration->movie =$request->movie;
            $celebration->dinner =$request->dinner;
            $celebration->eat_out =$request->eat_out;
            $celebration->play_with_siblings =$request->play_with_siblings;
            $celebration->friends_night_out =$request->friends_night_out;
            $celebration->others =$request->others;
            $celebration->created_at =$todaysDate;
            $celebration->save();


             //   stud_environment
             $environment->familytime =$request->familytime;
             $environment->friends =$request->friends;
             $environment->buddies =$request->buddies;
             $environment->personal_surroundings =$request->personal_surroundings;
             $environment->recycling_trash =$request->recycling_trash;
             $environment->grooming =$request->grooming;
             $environment->personal_hyigeine =$request->personal_hyigeine;
             $environment->nutirtion =$request->nutirtion;
             $environment->desired_environment =$request->desired_environment;
             $environment->be_with_friends =$request->be_with_friends;
             $environment->love_life =$request->love_life;
             $environment->shower_empathy =$request->shower_empathy;
             $environment->positive_feelings_on_relations =$request->positive_feelings_on_relations;
             $environment->positive_feelings_with_colleagues =$request->positive_feelings_with_colleagues;
             $environment->gratification =$request->gratification;
             $environment->meditation =$request->meditation;
             $environment->plannedsolitude =$request->plannedsolitude;
             $environment->walks_in_nature =$request->walks_in_nature;
             $environment->contemplation =$request->contemplation;
             $environment->family =$request->family;
             $environment->created_at =$todaysDate;
             $environment->save();


               //   stud_intellectualbreaks
               $intellectual->gainingknowledge =$request->gainingknowledge;
               $intellectual->reading =$request->reading;
               $intellectual->learning =$request->learning;
               $intellectual->planning =$request->planning;
               $intellectual->imagination =$request->imagination;
               $intellectual->goodmovies =$request->goodmovies;
               $intellectual->goals =$request->goals;
               $intellectual->values =$request->values;
               $intellectual->music =$request->music;
               $intellectual->audiomotivational =$request->audiomotivational;
               $intellectual->created_at =$todaysDate;
               $intellectual->save();


                 //   stud_learnandteachs
                 $learn->chapters =$request->chapters;
                 $learn->diagrams =$request->diagrams;
                 $learn->flowcharts =$request->flowcharts;
                 $learn->imaginaryaudience =$request->imaginaryaudience;
                 $learn->ownwords =$request->ownwords;
                 $learn->activework =$request->activework;
                 $learn->created_at =$todaysDate;
                 $learn->save();
  

                  //   stud_physiques
                  $physique->yoga =$request->yoga;
                  $physique->hitthegym =$request->hitthegym;
                  $physique->swimming =$request->swimming;
                  $physique->cycling =$request->cycling;
                  $physique->walking =$request->walking;
                  $physique->trekking =$request->trekking;
                  $physique->dancing =$request->dancing;
                  $physique->timelyeating =$request->timelyeating;
                  $physique->playing =$request->playing;
                  $physique->jogging =$request->jogging;
                  $physique->sleep =$request->sleep;
                  $physique->created_at =$todaysDate;
                  $physique->save();


                  //   stud_rule_of_threes
                  $rule->threeHoursperday =$request->threeHoursperday;
                
                  $rule->created_at =$todaysDate;
                  $rule->save();

            return response()->json([
                "status" => true,
                "message" => "Elite Student Petals Added!",
               
            ]);

        }
        
        

    }


    public function insert_stud_daily_planner(Request $request){

      $validatedData=Validator::make($request->all(),[
          "user_id"=>"required",
          

      ]);

      if($validatedData->fails())
      {
          return response()->json([
              "message"=>"validation fail",
              "status"=>"false"
          ]);
      }
      else{
          $id=$request->user_id;
          $c_date=date("Y-m-d");
          $info=Stud_daily_planner::where('user_id',$id)
                              ->whereDate('created_at','=',$c_date)
                              ->first();
          if($info){
              $user=Stud_daily_planner::where('user_id',$id)->first();
          }
          else{
              $user=new Stud_daily_planner;
              $user->user_id=$request->user_id;
             
          }

          $user->morning_visualization =$request->morning_visualization;
          $user->unanswred_questions =$request->unanswred_questions;
          $user->two_coloumn_stratergy =$request->two_coloumn_stratergy;
          $user->morning_plan_your_day =$request->morning_plan_your_day;
          $user->take_test =$request->take_test;
          $user->rule_of_three =$request->rule_of_three;
          $user->rule_of_one =$request->rule_of_one;
          $user->gratification =$request->gratification;
          $user->save();

          return response()->json([
              
              "message" => "data inserted",
             
          ]);

      }
      
      

  }





  
  public function get_stud_daily_planner(Request $request){

    $validatedData=Validator::make($request->all(),[
        "user_id"=>"required",
        "days"=>"required"
    ]);

    if($validatedData->fails())
    {
        return response()->json([
            "message"=>"validation fail"
        ]);
    }
    else{
        $id=$request->user_id;
        $days=$request->days;
        if($days==30){
            $register=Register::select('month_start','month_end')
                                ->where('id',$id)
                                ->first();

            $month_start=$register->month_start;
            $month_end=$register->month_end;
        }
        elseif($days==7){
            $register=Register::select('days_start','days_end')
            ->where('id',$id)
            ->first();

                $month_start=$register->days_start;
                $month_end=$register->days_end;
        }

        $info=Stud_daily_planner::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();
        $morning_visualization=[];
        $unanswred_questions=[];
        $two_coloumn_stratergy=[];
        $morning_plan_your_day=[];
        $take_test=[];
        $rule_of_three=[];
        $rule_of_one=[];
        $gratification=[];
        foreach($info as $i)
        {
            array_push($morning_visualization,$i->morning_visualization);
            array_push($unanswred_questions,$i->unanswred_questions);
            array_push($two_coloumn_stratergy,$i->two_coloumn_stratergy);
            array_push($morning_plan_your_day,$i->morning_plan_your_day);
            array_push($take_test,$i->take_test);
            array_push($rule_of_three,$i->rule_of_three);
            array_push($rule_of_one,$i->rule_of_one);
            array_push($gratification,$i->gratification);
        }
       $m_vis_count = array_count_values($morning_visualization);

        if(in_array('y',$morning_visualization)){
            $m_vis_y_count=$m_vis_count['y'];
        }
        else{
            $m_vis_y_count=0;
        }
        $m_vis_percent=round($this->percent($m_vis_y_count,$days), 2);


        $unanswred_questions_count = array_count_values($unanswred_questions); 
       if(in_array('y',$unanswred_questions)){
        $unanswred_questions_count_y_count=$unanswred_questions_count['y'];
       }
       else{
        $unanswred_questions_count_y_count=0;
       }
        $unanswred_questions_percent=round($this->percent($unanswred_questions_count_y_count,$days), 2);


        $two_coloumn_stratergy_count = array_count_values($two_coloumn_stratergy);
        if(in_array('y',$two_coloumn_stratergy)){
            $two_coloumn_stratergy_y_count=$two_coloumn_stratergy_count['y'];
        }
        else{
            $two_coloumn_stratergy_y_count=0;
        }
        $two_coloumn_stratergy_percent=round($this->percent($two_coloumn_stratergy_y_count,$days), 2);

        
        $morning_plan_your_day_count = array_count_values($morning_plan_your_day);
        if(in_array('y',$morning_plan_your_day)){
            $morning_plan_your_day_y_count=$morning_plan_your_day_count['y'];
        }
        else{
            $morning_plan_your_day_y_count=0;
        }
        $morning_plan_your_day_percent=round($this->percent($morning_plan_your_day_y_count,$days), 2);



        $take_test_count = array_count_values($take_test);
        if(in_array('y',$take_test)){
            $take_test_y_count=$take_test_count['y'];
        }
        else{
            $take_test_y_count=0;
        }
        $take_test_percent=round($this->percent($take_test_y_count,$days), 2);


        
        $rule_of_three_count = array_count_values($rule_of_three);
        if(in_array('y',$rule_of_three)){
            $rule_of_three_y_count=$rule_of_three_count['y'];
        }
        else{
            $rule_of_three_y_count=0;
        }
        $rule_of_three_percent=round($this->percent($rule_of_three_y_count,$days), 2);


        $rule_of_one_count = array_count_values($rule_of_one);
        if(in_array('y',$rule_of_one)){
            $rule_of_one_y_count=$rule_of_one_count['y'];
        }
        else{
            $rule_of_one_y_count=0;
        }
      $rule_of_one_percent=round($this->percent($rule_of_one_y_count,$days), 2);


      $gratification_count = array_count_values($gratification);
      if(in_array('y',$gratification)){
          $gratification_y_count=$gratification_count['y'];
      }
      else{
          $gratification_y_count=0;
      }
     $gratification_percent=round($this->percent($gratification_y_count,$days), 2);



        return response()->json([
            "morning_visualization"=>$m_vis_percent,
            "unanswred_questions"=>$unanswred_questions_percent,
            "two_coloumn_stratergy"=>$two_coloumn_stratergy_percent,
            "morning_plan_your_day"=>$morning_plan_your_day_percent,
            "take_test"=>$take_test_percent,
            "rule_of_three"=>$rule_of_three_percent,
            "rule_of_one"=>$rule_of_one_percent,
            "gratification"=>$gratification_percent
        ]);
     


    }

}

public function percent($y,$d){
    $per=($y*100)/(int)$d;
    return $per;
}







}
