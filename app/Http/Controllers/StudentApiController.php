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

}
