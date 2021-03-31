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

public function get_student_petals_percent(Request $request){

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

        //proactive start

        //learn and tech
        $info=Stud_learn_and_teach::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();
        $chapters=[];
        $diagrams=[];
        $flowcharts=[];
        $imaginaryaudience=[];
        $ownwords=[];
        $activework=[];
      
        foreach($info as $i)
        {
            array_push($chapters,$i->chapters);
            array_push($diagrams,$i->diagrams);
            array_push($flowcharts,$i->flowcharts);
            array_push($imaginaryaudience,$i->imaginaryaudience);
            array_push($ownwords,$i->ownwords);
            array_push($activework,$i->activework);
          
        }

        $chapters_count = array_count_values($chapters);
            if(in_array('y',$chapters)){
                $chapters_y_count=$chapters_count['y'];
            }
            else{
                $chapters_y_count=0;
            }
            $chapters_percent=round($this->percent($chapters_y_count,$days), 2);


         $diagrams_count = array_count_values($diagrams);
            if(in_array('y',$diagrams)){
                $diagrams_y_count=$diagrams_count['y'];
            }
            else{
                $diagrams_y_count=0;
            }
            $diagrams_percent=round($this->percent($diagrams_y_count,$days), 2);


         $flowcharts_count = array_count_values($flowcharts);
            if(in_array('y',$flowcharts)){
                $flowcharts_y_count=$flowcharts_count['y'];
            }
            else{
                $flowcharts_y_count=0;
            }
         $flowcharts_percent=round($this->percent($flowcharts_y_count,$days), 2);

        $imaginaryaudience_count = array_count_values($imaginaryaudience);
         if(in_array('y',$imaginaryaudience)){
             $imaginaryaudience_y_count=$imaginaryaudience_count['y'];
         }
         else{
             $imaginaryaudience_y_count=0;
         }
      $imaginaryaudience_percent=round($this->percent($imaginaryaudience_y_count,$days), 2);


      


    $ownwords_count = array_count_values($ownwords);
    if(in_array('y',$ownwords)){
        $ownwords_y_count=$ownwords_count['y'];
    }
    else{
        $ownwords_y_count=0;
    }
  $ownwords_percent=round($this->percent($ownwords_y_count,$days), 2);


  $activework_count = array_count_values($activework);
  if(in_array('y',$activework)){
      $activework_y_count=$activework_count['y'];
  }
  else{
      $activework_y_count=0;
  }
  $activework_percent=round($this->percent($activework_y_count,$days), 2);

  $stud_learn_tech_percentage=($chapters_percent+$diagrams_percent+$activework_percent+$imaginaryaudience_percent+$ownwords_percent+$activework_percent)/6;


//learn and tech

//intelectual break 


        $intelectual=Stud_intellectual_break::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();
        $gainingknowledge=[];
        $reading=[];
        $learning=[];
        $planning=[];
        $imagination=[];
        $goodmovies=[];
        $goals=[];
        $values=[];
        $music=[];
        $audiomotivational=[];
      
        foreach($intelectual as $i)
        {
            array_push($gainingknowledge,$i->gainingknowledge);
            array_push($reading,$i->reading);
            array_push($learning,$i->learning);
            array_push($planning,$i->planning);
            array_push($imagination,$i->imagination);
            array_push($goodmovies,$i->goodmovies);

            array_push($goals,$i->goals);
            array_push($values,$i->values);
            array_push($music,$i->music);
            array_push($audiomotivational,$i->audiomotivational);
          
        }

        $gainingknowledge_count = array_count_values($gainingknowledge);
            if(in_array('y',$gainingknowledge)){
                $gainingknowledge_y_count=$gainingknowledge_count['y'];
            }
            else{
                $gainingknowledge_y_count=0;
            }
            $gainingknowledge_percent=round($this->percent($gainingknowledge_y_count,$days), 2);


         $reading_count = array_count_values($reading);
            if(in_array('y',$reading)){
                $reading_y_count=$reading_count['y'];
            }
            else{
                $reading_y_count=0;
            }
          $reading_percent=round($this->percent($reading_y_count,$days), 2);


         $learning_count = array_count_values($learning);
            if(in_array('y',$learning)){
                $learning_y_count=$learning_count['y'];
            }
            else{
                $learning_y_count=0;
            }
         $learning_percent=round($this->percent($learning_y_count,$days), 2);

        $planning_count = array_count_values($planning);
         if(in_array('y',$planning)){
             $planning_y_count=$planning_count['y'];
         }
         else{
             $planning_y_count=0;
         }
     $planning_percent=round($this->percent($planning_y_count,$days), 2);


      $imagination_count = array_count_values($imagination);
      if(in_array('y',$imagination)){
          $imagination_y_count=$imagination_count['y'];
      }
      else{
          $imagination_y_count=0;
      }
   $imagination_percent=round($this->percent($imagination_y_count,$days), 2);


    $goodmovies_count = array_count_values($goodmovies);
    if(in_array('y',$goodmovies)){
        $goodmovies_y_count=$goodmovies_count['y'];
    }
    else{
        $goodmovies_y_count=0;
    }
  $goodmovies_percent=round($this->percent($goodmovies_y_count,$days), 2);


  $goals_count = array_count_values($goals);
  if(in_array('y',$goals)){
      $goals_y_count=$goals_count['y'];
  }
  else{
      $goals_y_count=0;
  }
  $goals_percent=round($this->percent($goals_y_count,$days), 2);


  
  $values_count = array_count_values($values);
  if(in_array('y',$values)){
      $values_y_count=$values_count['y'];
  }
  else{
      $values_y_count=0;
  }
$values_percent=round($this->percent($values_y_count,$days), 2);



$music_count = array_count_values($music);
if(in_array('y',$music)){
    $music_y_count=$music_count['y'];
}
else{
    $music_y_count=0;
}
$music_percent=round($this->percent($music_y_count,$days), 2);



$audiomotivational_count = array_count_values($audiomotivational);
if(in_array('y',$audiomotivational)){
    $audiomotivational_y_count=$audiomotivational_count['y'];
}
else{
    $audiomotivational_y_count=0;
}
$audiomotivational_percent=round($this->percent($audiomotivational_y_count,$days), 2);

 $stud_intellectualbreaks_percentage=(
      $gainingknowledge_percent+
      $reading_percent+
      $learning_percent+
      $planning_percent+
      $imagination_percent+
      $goodmovies_percent+
      $goals_percent+
      $values_percent+
      $music_percent+
      $audiomotivational_percent)/10;


 $proactive_percent=($stud_learn_tech_percentage+$stud_intellectualbreaks_percentage)/2;


//intelectual break 


        //proactive end


        //dedication
            //rule of threee

                
        $stud_rule_of_three=Stud_rule_of_three::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();
        $threeHoursperday=[];
        
      
        foreach($stud_rule_of_three as $i)
        {
            array_push($threeHoursperday,$i->threeHoursperday);
            
          
        }

        $threeHoursperday_count = array_count_values($threeHoursperday);
            if(in_array('y',$threeHoursperday)){
                $threeHoursperday_y_count=$threeHoursperday_count['y'];
            }
            else{
                $threeHoursperday_y_count=0;
            }
            $threeHoursperday_percent=round($this->percent($threeHoursperday_y_count,$days), 2);

            //rule of three


            //brainstromming

            $brainstromming=Stud_brainstorming::where('user_id',$id)
                            ->whereBetween('created_at', [$month_start, $month_end])
                            ->get();
        $brainstormingsession=[];
        $getanswers=[];
        $review=[];
        $practice=[];
      
      
        foreach($brainstromming as $i)
        {
            array_push($brainstormingsession,$i->brainstormingsession);
            array_push($getanswers,$i->getanswers);
            array_push($review,$i->review);
            array_push($practice,$i->practice);
          
          
        }

        $brainstormingsession_count = array_count_values($brainstormingsession);
            if(in_array('y',$brainstormingsession)){
                $brainstormingsession_y_count=$brainstormingsession_count['y'];
            }
            else{
                $brainstormingsession_y_count=0;
            }
          $brainstormingsession_percent=round($this->percent($brainstormingsession_y_count,$days), 2);


         $getanswers_count = array_count_values($getanswers);
            if(in_array('y',$getanswers)){
                $getanswers_y_count=$getanswers_count['y'];
            }
            else{
                $getanswers_y_count=0;
            }
            $getanswers_percent=round($this->percent($getanswers_y_count,$days), 2);


         $review_count = array_count_values($review);
            if(in_array('y',$review)){
                $review_y_count=$review_count['y'];
            }
            else{
                $review_y_count=0;
            }
         $review_percent=round($this->percent($review_y_count,$days), 2);

        $practice_count = array_count_values($practice);
         if(in_array('y',$practice)){
             $practice_y_count=$practice_count['y'];
         }
         else{
             $practice_y_count=0;
         }
      $practice_percent=round($this->percent($practice_y_count,$days), 2);


  $stud_brainstorming_percentage=($brainstormingsession_percent+
                                    $getanswers_percent+
                                    $review_percent+
                                    $practice_percent)/4;


            //brainstromming

     $dedication_percent=($stud_brainstorming_percentage+$threeHoursperday_percent)/2;
        //dedication 


        //Synergize
            //physique
                    
                $physique=Stud_physique::where('user_id',$id)
                                ->whereBetween('created_at', [$month_start, $month_end])
                                ->get();
                $yoga=[];
                $hitthegym=[];
                $swimming=[];
                $cycling=[];
                $walking=[];
                $trekking=[];
                $dancing=[];
                $timelyeating=[];
                $playing=[];
                $jogging=[];
                $sleep=[];
            
                foreach($physique as $i)
                {
                    array_push($yoga,$i->yoga);
                    array_push($hitthegym,$i->hitthegym);
                    array_push($swimming,$i->swimming);
                    array_push($cycling,$i->cycling);
                    array_push($walking,$i->walking);
                    array_push($trekking,$i->trekking);
                    array_push($dancing,$i->dancing);
                    array_push($timelyeating,$i->timelyeating);
                    array_push($playing,$i->playing);
                    array_push($jogging,$i->jogging);
                    array_push($sleep,$i->sleep);
                
                }

                $yoga_count = array_count_values($yoga);
                    if(in_array('y',$yoga)){
                        $yoga_y_count=$yoga_count['y'];
                    }
                    else{
                        $yoga_y_count=0;
                    }
              $yoga_percent=round($this->percent($yoga_y_count,$days), 2);


                $hitthegym_count = array_count_values($hitthegym);
                    if(in_array('y',$hitthegym)){
                        $hitthegym_y_count=$hitthegym_count['y'];
                    }
                    else{
                        $hitthegym_y_count=0;
                    }
                $hitthegym_percent=round($this->percent($hitthegym_y_count,$days), 2);


                $swimming_count = array_count_values($swimming);
                    if(in_array('y',$swimming)){
                        $swimming_y_count=$swimming_count['y'];
                    }
                    else{
                        $swimming_y_count=0;
                    }
               $swimming_percent=round($this->percent($swimming_y_count,$days), 2);

                $cycling_count = array_count_values($cycling);
                if(in_array('y',$cycling)){
                    $cycling_y_count=$cycling_count['y'];
                }
                else{
                    $cycling_y_count=0;
                }
            $cycling_percent=round($this->percent($cycling_y_count,$days), 2);


            $walking_count = array_count_values($walking);
            if(in_array('y',$walking)){
                $walking_y_count=$walking_count['y'];
            }
            else{
                $walking_y_count=0;
            }
           $walking_percent=round($this->percent($walking_y_count,$days), 2);


            $trekking_count = array_count_values($trekking);
            if(in_array('y',$trekking)){
                $trekking_y_count=$trekking_count['y'];
            }
            else{
                $trekking_y_count=0;
            }
        $trekking_percent=round($this->percent($trekking_y_count,$days), 2);


        $dancing_count = array_count_values($dancing);
        if(in_array('y',$dancing)){
            $dancing_y_count=$dancing_count['y'];
        }
        else{
            $dancing_y_count=0;
        }
        $dancing_percent=round($this->percent($dancing_y_count,$days), 2);


        
        $timelyeating_count = array_count_values($timelyeating);
        if(in_array('y',$timelyeating)){
            $timelyeating_y_count=$timelyeating_count['y'];
        }
        else{
            $timelyeating_y_count=0;
        }
        $timelyeating_percent=round($this->percent($timelyeating_y_count,$days), 2);



        $playing_count = array_count_values($playing);
        if(in_array('y',$playing)){
            $playing_y_count=$playing_count['y'];
        }
        else{
            $playing_y_count=0;
        }
        $playing_percent=round($this->percent($playing_y_count,$days), 2);



        $jogging_count = array_count_values($jogging);
        if(in_array('y',$jogging)){
            $jogging_y_count=$jogging_count['y'];
        }
        else{
            $jogging_y_count=0;
        }
        $jogging_percent=round($this->percent($jogging_y_count,$days), 2);

        $sleep_count = array_count_values($sleep);
        if(in_array('y',$sleep)){
            $sleep_y_count=$sleep_count['y'];
        }
        else{
            $sleep_y_count=0;
        }
        $sleep_percent=round($this->percent($sleep_y_count,$days), 2);

         $stud_physiques_percentage=(
            $yoga_percent+
            $hitthegym_percent+
            $swimming_percent+
            $cycling_percent+
            $walking_percent+
            $trekking_percent+
            $dancing_percent+
            $timelyeating_percent+
            $playing_percent+
            $jogging_percent+
            $sleep_percent)/11;
            //physique




            //celebrate
                    
                $celebrate=Stud_celebration::where('user_id',$id)
                                ->whereBetween('created_at', [$month_start, $month_end])
                                ->get();
                $party_time=[];
                $music=[];
                $movie=[];
                $dinner=[];
                $eat_out=[];
                $play_with_siblings=[];
                $friends_night_out=[];
                $others=[];
             
            
                foreach($celebrate as $i)
                {
                    array_push($party_time,$i->party_time);
                    array_push($music,$i->music);
                    array_push($movie,$i->movie);
                    array_push($dinner,$i->dinner);
                    array_push($eat_out,$i->eat_out);
                    array_push($play_with_siblings,$i->play_with_siblings);
                    array_push($friends_night_out,$i->friends_night_out);
                    array_push($others,$i->others);
                
                }

                $party_time_count = array_count_values($party_time);
                    if(in_array('y',$party_time)){
                        $party_time_y_count=$party_time_count['y'];
                    }
                    else{
                        $party_time_y_count=0;
                    }
              $party_time_percent=round($this->percent($party_time_y_count,$days), 2);


                $music_count = array_count_values($music);
                    if(in_array('y',$music)){
                        $music_y_count=$music_count['y'];
                    }
                    else{
                        $music_y_count=0;
                    }
                $music_percent=round($this->percent($music_y_count,$days), 2);


                $movie_count = array_count_values($movie);
                    if(in_array('y',$movie)){
                        $movie_y_count=$movie_count['y'];
                    }
                    else{
                        $movie_y_count=0;
                    }
              $movie_percent=round($this->percent($movie_y_count,$days), 2);

                $dinner_count = array_count_values($dinner);
                if(in_array('y',$dinner)){
                    $dinner_y_count=$dinner_count['y'];
                }
                else{
                    $dinner_y_count=0;
                }
             $dinner_percent=round($this->percent($dinner_y_count,$days), 2);


            $eat_out_count = array_count_values($eat_out);
            if(in_array('y',$eat_out)){
                $eat_out_y_count=$eat_out_count['y'];
            }
            else{
                $eat_out_y_count=0;
            }
           $eat_out_percent=round($this->percent($eat_out_y_count,$days), 2);


            $play_with_siblings_count = array_count_values($play_with_siblings);
            if(in_array('y',$play_with_siblings)){
                $play_with_siblings_y_count=$play_with_siblings_count['y'];
            }
            else{
                $play_with_siblings_y_count=0;
            }
        $play_with_siblings_percent=round($this->percent($play_with_siblings_y_count,$days), 2);


        $friends_night_out_count = array_count_values($friends_night_out);
        if(in_array('y',$friends_night_out)){
            $friends_night_out_y_count=$friends_night_out_count['y'];
        }
        else{
            $friends_night_out_y_count=0;
        }
        $friends_night_out_percent=round($this->percent($friends_night_out_y_count,$days), 2);


        
        $others_count = array_count_values($others);
        if(in_array('y',$others)){
            $others_y_count=$others_count['y'];
        }
        else{
            $others_y_count=0;
        }
        $others_percent=round($this->percent($others_y_count,$days), 2);



        $stud_celebrate_percentage=(
            $party_time_percent+
            $music_percent+
            $movie_percent+
            $dinner_percent+
            $eat_out_percent+
            $play_with_siblings_percent+
            $friends_night_out_percent+
            $others_percent)/8;
            //celebrate
                    
            //environment
                
                    
                $environment=Stud_environment::where('user_id',$id)
                                ->whereBetween('created_at', [$month_start, $month_end])
                                ->get();
                $familytime=[];
                $friends=[];
                $buddies=[];
                $personal_surroundings=[];
                $recycling_trash=[];
                $grooming=[];
                $personal_hyigeine=[];
                $nutirtion=[];
                $desired_environment=[];
                $be_with_friends=[];
                $love_life=[];

                $shower_empathy=[];
                $positive_feelings_on_relations=[];
                $positive_feelings_with_colleagues=[];
                $gratification=[];
                $meditation=[];
                $plannedsolitude=[];
                $walks_in_nature=[];
                $contemplation=[];
                $family=[];
               
            
                foreach($environment as $i)
                {
                    array_push($familytime,$i->familytime);
                    array_push($friends,$i->friends);
                    array_push($buddies,$i->buddies);
                    array_push($personal_surroundings,$i->personal_surroundings);
                    array_push($recycling_trash,$i->recycling_trash);
                    array_push($grooming,$i->grooming);
                    array_push($personal_hyigeine,$i->personal_hyigeine);
                    array_push($nutirtion,$i->nutirtion);
                    array_push($desired_environment,$i->desired_environment);
                    array_push($be_with_friends,$i->be_with_friends);
                    array_push($love_life,$i->love_life);

                    array_push($shower_empathy,$i->shower_empathy);
                    array_push($positive_feelings_on_relations,$i->positive_feelings_on_relations);
                    array_push($positive_feelings_with_colleagues,$i->positive_feelings_with_colleagues);
                    array_push($gratification,$i->gratification);
                    array_push($meditation,$i->meditation);
                    array_push($plannedsolitude,$i->plannedsolitude);
                    array_push($walks_in_nature,$i->walks_in_nature);
                    array_push($contemplation,$i->contemplation);
                    array_push($family,$i->family);
                
                }

                $familytime_count = array_count_values($familytime);
                    if(in_array('y',$familytime)){
                     $familytime_y_count=$familytime_count['y'];
                    }
                    else{
                        $familytime_y_count=0;
                    }
          $familytime_percent=round($this->percent($familytime_y_count,$days), 2);


                $friends_count = array_count_values($friends);
                    if(in_array('y',$friends)){
                        $friends_y_count=$friends_count['y'];
                    }
                    else{
                        $friends_y_count=0;
                    }
                $friends_percent=round($this->percent($friends_y_count,$days), 2);


                $buddies_count = array_count_values($buddies);
                    if(in_array('y',$buddies)){
                        $buddies_y_count=$buddies_count['y'];
                    }
                    else{
                        $buddies_y_count=0;
                    }
           $buddies_percent=round($this->percent($buddies_y_count,$days), 2);

                $personal_surroundings_count = array_count_values($personal_surroundings);
                if(in_array('y',$personal_surroundings)){
                    $personal_surroundings_y_count=$personal_surroundings_count['y'];
                }
                else{
                    $personal_surroundings_y_count=0;
                }
            $personal_surroundings_percent=round($this->percent($personal_surroundings_y_count,$days), 2);


            $recycling_trash_count = array_count_values($recycling_trash);
            if(in_array('y',$recycling_trash)){
                $recycling_trash_y_count=$recycling_trash_count['y'];
            }
            else{
                $recycling_trash_y_count=0;
            }
           $recycling_trash_percent=round($this->percent($recycling_trash_y_count,$days), 2);


            $grooming_count = array_count_values($grooming);
            if(in_array('y',$trekking)){
                $grooming_y_count=$grooming_count['y'];
            }
            else{
                $grooming_y_count=0;
            }
        $grooming_percent=round($this->percent($grooming_y_count,$days), 2);


        $personal_hyigeine_count = array_count_values($personal_hyigeine);
        if(in_array('y',$personal_hyigeine)){
            $personal_hyigeine_y_count=$personal_hyigeine_count['y'];
        }
        else{
            $personal_hyigeine_y_count=0;
        }
        $personal_hyigeine_percent=round($this->percent($personal_hyigeine_y_count,$days), 2);


        
        $nutirtion_count = array_count_values($nutirtion);
        if(in_array('y',$nutirtion)){
            $nutirtion_y_count=$nutirtion_count['y'];
        }
        else{
            $nutirtion_y_count=0;
        }
        $nutirtion_percent=round($this->percent($nutirtion_y_count,$days), 2);



        $desired_environment_count = array_count_values($desired_environment);
        if(in_array('y',$desired_environment)){
            $desired_environment_y_count=$desired_environment_count['y'];
        }
        else{
            $desired_environment_y_count=0;
        }
        $desired_environment_percent=round($this->percent($desired_environment_y_count,$days), 2);



        $be_with_friends_count = array_count_values($be_with_friends);
        if(in_array('y',$be_with_friends)){
            $be_with_friends_y_count=$be_with_friends_count['y'];
        }
        else{
            $be_with_friends_y_count=0;
        }
        $be_with_friends_percent=round($this->percent($be_with_friends_y_count,$days), 2);

        $love_life_count = array_count_values($love_life);
        if(in_array('y',$love_life)){
            $love_life_y_count=$love_life_count['y'];
        }
        else{
            $love_life_y_count=0;
        }
        $love_life_percent=round($this->percent($love_life_y_count,$days), 2);




        
        $shower_empathy_count = array_count_values($shower_empathy);
            if(in_array('y',$shower_empathy)){
                $shower_empathy_y_count=$shower_empathy_count['y'];
            }
            else{
                $shower_empathy_y_count=0;
            }
       $shower_empathy_percent=round($this->percent($shower_empathy_y_count,$days), 2);


            $positive_feelings_on_relations_count = array_count_values($positive_feelings_on_relations);
            if(in_array('y',$positive_feelings_on_relations)){
                $positive_feelings_on_relations_y_count=$positive_feelings_on_relations_count['y'];
            }
            else{
                $positive_feelings_on_relations_y_count=0;
            }
            $positive_feelings_on_relations_percent=round($this->percent($positive_feelings_on_relations_y_count,$days), 2);


            $positive_feelings_with_colleagues_count = array_count_values($positive_feelings_with_colleagues);
            if(in_array('y',$positive_feelings_with_colleagues)){
                $positive_feelings_with_colleagues_y_count=$positive_feelings_with_colleagues_count['y'];
            }
            else{
                $positive_feelings_with_colleagues_y_count=0;
            }
           $positive_feelings_with_colleagues_percent=round($this->percent($positive_feelings_with_colleagues_y_count,$days), 2);


            $gratification_count = array_count_values($gratification);
            if(in_array('y',$gratification)){
                $gratification_y_count=$gratification_count['y'];
            }
            else{
                $gratification_y_count=0;
            }
        $gratification_percent=round($this->percent($gratification_y_count,$days), 2);


        $meditation_count = array_count_values($meditation);
        if(in_array('y',$meditation)){
            $meditation_y_count=$meditation_count['y'];
        }
        else{
            $meditation_y_count=0;
        }
        $meditation_percent=round($this->percent($meditation_y_count,$days), 2);


        
        $plannedsolitude_count = array_count_values($plannedsolitude);
        if(in_array('y',$plannedsolitude)){
            $plannedsolitude_y_count=$plannedsolitude_count['y'];
        }
        else{
            $plannedsolitude_y_count=0;
        }
        $plannedsolitude_percent=round($this->percent($plannedsolitude_y_count,$days), 2);



        $walks_in_nature_count = array_count_values($walks_in_nature);
        if(in_array('y',$walks_in_nature)){
            $walks_in_nature_y_count=$walks_in_nature_count['y'];
        }
        else{
            $walks_in_nature_y_count=0;
        }
        $walks_in_nature_percent=round($this->percent($walks_in_nature_y_count,$days), 2);



        $contemplation_count = array_count_values($contemplation);
        if(in_array('y',$contemplation)){
            $contemplation_y_count=$contemplation_count['y'];
        }
        else{
            $contemplation_y_count=0;
        }
      $contemplation_percent=round($this->percent($contemplation_y_count,$days), 2);

        $family_count = array_count_values($family);
        if(in_array('y',$family)){
            $family_y_count=$family_count['y'];
        }
        else{
            $family_y_count=0;
        }
       $family_percent=round($this->percent($family_y_count,$days), 2);


       $stud_environment_percentage=(
            $familytime_percent+
            $friends_percent+
            $buddies_percent+
            $personal_surroundings_percent+
            $recycling_trash_percent+
            $grooming_percent+
            $personal_hyigeine_percent+
            $nutirtion_percent+
            $desired_environment_percent+
            $be_with_friends_percent+
            $love_life_percent+

            $shower_empathy_percent+
            $positive_feelings_on_relations_percent+
            $positive_feelings_with_colleagues_percent+
            $gratification_percent+
            $meditation_percent+
            $plannedsolitude_percent+
            $walks_in_nature_percent+
            $contemplation_percent+
            $family_percent
            )/20;
            
            //environment
         $synengize_percent=($stud_physiques_percentage+$stud_environment_percentage+$stud_celebrate_percentage)/3;
        //Synergize


        return response()->json([
            "proactive_percent"=>$proactive_percent,
            "dedication"=>$dedication_percent,
            "synengize_percent"=>$synengize_percent,
            
        ]);

    }

}


public function stud_learn_and_tech_percent(Request $request){

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

         //learn and tech
        $info=Stud_learn_and_teach::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();
        $chapters=[];
        $diagrams=[];
        $flowcharts=[];
        $imaginaryaudience=[];
        $ownwords=[];
        $activework=[];
      
        foreach($info as $i)
        {
            array_push($chapters,$i->chapters);
            array_push($diagrams,$i->diagrams);
            array_push($flowcharts,$i->flowcharts);
            array_push($imaginaryaudience,$i->imaginaryaudience);
            array_push($ownwords,$i->ownwords);
            array_push($activework,$i->activework);
          
        }

        $chapters_count = array_count_values($chapters);
            if(in_array('y',$chapters)){
                $chapters_y_count=$chapters_count['y'];
            }
            else{
                $chapters_y_count=0;
            }
            $chapters_percent=round($this->percent($chapters_y_count,$days), 2);


         $diagrams_count = array_count_values($diagrams);
            if(in_array('y',$diagrams)){
                $diagrams_y_count=$diagrams_count['y'];
            }
            else{
                $diagrams_y_count=0;
            }
            $diagrams_percent=round($this->percent($diagrams_y_count,$days), 2);


         $flowcharts_count = array_count_values($flowcharts);
            if(in_array('y',$flowcharts)){
                $flowcharts_y_count=$flowcharts_count['y'];
            }
            else{
                $flowcharts_y_count=0;
            }
         $flowcharts_percent=round($this->percent($flowcharts_y_count,$days), 2);

        $imaginaryaudience_count = array_count_values($imaginaryaudience);
         if(in_array('y',$imaginaryaudience)){
             $imaginaryaudience_y_count=$imaginaryaudience_count['y'];
         }
         else{
             $imaginaryaudience_y_count=0;
         }
      $imaginaryaudience_percent=round($this->percent($imaginaryaudience_y_count,$days), 2);


      


        $ownwords_count = array_count_values($ownwords);
        if(in_array('y',$ownwords)){
            $ownwords_y_count=$ownwords_count['y'];
        }
        else{
            $ownwords_y_count=0;
        }
    $ownwords_percent=round($this->percent($ownwords_y_count,$days), 2);


    $activework_count = array_count_values($activework);
    if(in_array('y',$activework)){
        $activework_y_count=$activework_count['y'];
    }
    else{
        $activework_y_count=0;
    }
    $activework_percent=round($this->percent($activework_y_count,$days), 2);

  


    //learn and tech
    return response()->json([
        "chapters_percent"=>$chapters_percent,
        "diagrams_percent"=>$diagrams_percent,
        "activework_percent"=>$activework_percent,
        "imaginaryaudience_percent"=>$imaginaryaudience_percent,
        "ownwords_percent"=>$ownwords_percent,
        "activework_percent"=>$activework_percent,

    ]);



    }

}


public function stud_intelectual_break_percent(Request $request){

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


        //intelectual break 


        $intelectual=Stud_intellectual_break::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();
        $gainingknowledge=[];
        $reading=[];
        $learning=[];
        $planning=[];
        $imagination=[];
        $goodmovies=[];
        $goals=[];
        $values=[];
        $music=[];
        $audiomotivational=[];
      
        foreach($intelectual as $i)
        {
            array_push($gainingknowledge,$i->gainingknowledge);
            array_push($reading,$i->reading);
            array_push($learning,$i->learning);
            array_push($planning,$i->planning);
            array_push($imagination,$i->imagination);
            array_push($goodmovies,$i->goodmovies);

            array_push($goals,$i->goals);
            array_push($values,$i->values);
            array_push($music,$i->music);
            array_push($audiomotivational,$i->audiomotivational);
          
        }

        $gainingknowledge_count = array_count_values($gainingknowledge);
            if(in_array('y',$gainingknowledge)){
                $gainingknowledge_y_count=$gainingknowledge_count['y'];
            }
            else{
                $gainingknowledge_y_count=0;
            }
            $gainingknowledge_percent=round($this->percent($gainingknowledge_y_count,$days), 2);


         $reading_count = array_count_values($reading);
            if(in_array('y',$reading)){
                $reading_y_count=$reading_count['y'];
            }
            else{
                $reading_y_count=0;
            }
          $reading_percent=round($this->percent($reading_y_count,$days), 2);


         $learning_count = array_count_values($learning);
            if(in_array('y',$learning)){
                $learning_y_count=$learning_count['y'];
            }
            else{
                $learning_y_count=0;
            }
         $learning_percent=round($this->percent($learning_y_count,$days), 2);

        $planning_count = array_count_values($planning);
         if(in_array('y',$planning)){
             $planning_y_count=$planning_count['y'];
         }
         else{
             $planning_y_count=0;
         }
     $planning_percent=round($this->percent($planning_y_count,$days), 2);


      $imagination_count = array_count_values($imagination);
      if(in_array('y',$imagination)){
          $imagination_y_count=$imagination_count['y'];
      }
      else{
          $imagination_y_count=0;
      }
   $imagination_percent=round($this->percent($imagination_y_count,$days), 2);


    $goodmovies_count = array_count_values($goodmovies);
    if(in_array('y',$goodmovies)){
        $goodmovies_y_count=$goodmovies_count['y'];
    }
    else{
        $goodmovies_y_count=0;
    }
  $goodmovies_percent=round($this->percent($goodmovies_y_count,$days), 2);


  $goals_count = array_count_values($goals);
  if(in_array('y',$goals)){
      $goals_y_count=$goals_count['y'];
  }
  else{
      $goals_y_count=0;
  }
  $goals_percent=round($this->percent($goals_y_count,$days), 2);


  
  $values_count = array_count_values($values);
  if(in_array('y',$values)){
      $values_y_count=$values_count['y'];
  }
  else{
      $values_y_count=0;
  }
$values_percent=round($this->percent($values_y_count,$days), 2);



$music_count = array_count_values($music);
if(in_array('y',$music)){
    $music_y_count=$music_count['y'];
}
else{
    $music_y_count=0;
}
$music_percent=round($this->percent($music_y_count,$days), 2);



$audiomotivational_count = array_count_values($audiomotivational);
if(in_array('y',$audiomotivational)){
    $audiomotivational_y_count=$audiomotivational_count['y'];
}
else{
    $audiomotivational_y_count=0;
}
$audiomotivational_percent=round($this->percent($audiomotivational_y_count,$days), 2);




      return response()->json([
        "gainingknowledge_percent"=>$gainingknowledge_percent,
        "reading_percent"=>$reading_percent,
        "planning_percent"=>$planning_percent,
        "imagination_percent"=>$imagination_percent,
        "goodmovies_percent"=>$goodmovies_percent,
        "goals_percent"=>$goals_percent,
        "values_percent"=>$values_percent,
        "music_percent"=>$music_percent,
        "audiomotivational_percent"=>$audiomotivational_percent,

    ]);




//intelectual break 


    }


}

public function stud_rule_of_three_percent(Request $request){

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

        //rule of threee

                
        $stud_rule_of_three=Stud_rule_of_three::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();
        $threeHoursperday=[];
        
      
        foreach($stud_rule_of_three as $i)
        {
            array_push($threeHoursperday,$i->threeHoursperday);
            
          
        }

        $threeHoursperday_count = array_count_values($threeHoursperday);
            if(in_array('y',$threeHoursperday)){
                $threeHoursperday_y_count=$threeHoursperday_count['y'];
            }
            else{
                $threeHoursperday_y_count=0;
            }
            $threeHoursperday_percent=round($this->percent($threeHoursperday_y_count,$days), 2);

            //rule of three
            return response()->json([
                "threeHoursperday_percent"=>$threeHoursperday_percent,
            ]);


    }

}




public function percent($y,$d){
    $per=($y*100)/(int)$d;
    return $per;
}







}
