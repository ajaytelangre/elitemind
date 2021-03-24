<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Loa_gratification;
use App\Models\Loa_unique_things;
use App\Models\Loa_lesson_of_day;
use App\Models\Loa_unproductive_task;
use App\Models\Celebrations;
use App\Models\Spirtuality;
use App\Models\Emotion;
use App\Models\Intellectual;
use App\Models\Skills;
use App\Models\Physique;
use App\Models\Environmental;
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


    public function get_loa_unproductive_task(Request $request){
        

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
          

            $unproductivetask= Loa_unproductive_task::where('register_id',$id)
                                                ->whereBetween('created', [$month_start, $month_end]) 
                                                ->get();
            return $unproductivetask;


        }
       
    }



    public function insert_elite_petals(Request $request){

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

            // Celebration
            $info=Celebrations::where('user_id',$id)
                                ->whereDate('created_at','=',$c_date)
                                ->first();

            if($info){
                $user=Celebrations::where('user_id',$id)->first();
            }
            else{
                $user=new Celebrations;
                $user->user_id=$request->user_id;
               
            }
            // spirtualitys
            $info1=Spirtuality::where('user_id',$id)
                                ->whereDate('created_at','=',$c_date)
                                ->first();
           

            if($info1){
                $user1=Spirtuality::where('user_id',$id)->first();
            }
            else{
                $user1=new Spirtuality;
                $user1->user_id=$request->user_id;
               
            }

              // Emotion
              $info2=Emotion::where('user_id',$id)
              ->whereDate('created_at','=',$c_date)
              ->first();


            if($info2){
            $user2=Emotion::where('user_id',$id)->first();
            }
            else{
            $user2=new Emotion;
            $user2->user_id=$request->user_id;

            }

             // Intellectual
             $info3=Intellectual::where('user_id',$id)
             ->whereDate('created_at','=',$c_date)
             ->first();


           if($info3){
           $user3=Intellectual::where('user_id',$id)->first();
           }
           else{
           $user3=new Intellectual;
           $user3->user_id=$request->user_id;

           }

           
             // Skills
             $info4=Skills::where('user_id',$id)
             ->whereDate('created_at','=',$c_date)
             ->first();


           if($info4){
           $user4=Skills::where('user_id',$id)->first();
           }
           else{
           $user4=new Skills;
           $user4->user_id=$request->user_id;

           }
             // Physique
             $info5=Physique::where('user_id',$id)
             ->whereDate('created_at','=',$c_date)
             ->first();


           if($info5){
           $user5=Physique::where('user_id',$id)->first();
           }
           else{
           $user5=new Physique;
           $user5->user_id=$request->user_id;

           }
             // Environmental
             $info6=Environmental::where('user_id',$id)
             ->whereDate('created_at','=',$c_date)
             ->first();


           if($info6){
           $user6=Environmental::where('user_id',$id)->first();
           }
           else{
           $user6=new Environmental;
           $user6->user_id=$request->user_id;
         }

            //    Celebration
            $user->party_time =$request->party_time;
            $user->music =$request->music;
            $user->movie =$request->movie;
            $user->dinner =$request->dinner;
            $user->eat_out =$request->eat_out;
            $user->play_with_kids =$request->play_with_kids;
            $user->friends_night_out =$request->friends_night_out;
            $user->created_at =Carbon::now()->toDateTimeString();
            $user->save();
            //   Sprituality
            $user1->meditation =$request->meditation;
            $user1->planned_solitude =$request->planned_solitude;
            $user1->walk_in_nature =$request->walk_in_nature;
            $user1->contemplation =$request->contemplation;
            $user1->prayer =$request->prayer;
            $user1->devotional_song =$request->devotional_song;
            $user1->visit_to_religious_place =$request->visit_to_religious_place;
            $user1->created_at =Carbon::now()->toDateTimeString();
            $user1->save();


             //   Emotions
             $user2->spend_time_with_family =$request->spend_time_with_family;
             $user2->be_with_friend =$request->be_with_friend;
             $user2->love_life =$request->love_life;
             $user2->shower_emphathy =$request->shower_emphathy;
             $user2->positive_feeling_on_relation =$request->positive_feeling_on_relation;
             $user2->positive_feeling_with_colleagues =$request->positive_feeling_with_colleagues;
             $user2->gratification =$request->gratification;
             $user2->created_at =Carbon::now()->toDateTimeString();
             $user2->save();


               //   Intellectual
               $user3->gaining_knowledge =$request->gaining_knowledge;
               $user3->reading =$request->reading;
               $user3->learning_language =$request->learning_language;
               $user3->planning =$request->planning;
               $user3->imagination =$request->imagination;
               $user3->good_movie =$request->good_movie;
               $user3->goals =$request->goals;
               $user3->created_at =Carbon::now()->toDateTimeString();
               $user3->save();


                 //   Skills
                 $user4->planning_for_financial_helth =$request->planning_for_financial_helth;
                 $user4->spend_time_on_project =$request->spend_time_on_project;
                 $user4->saving =$request->saving;
                 $user4->investment =$request->investment;
                 $user4->negotiating_skills =$request->negotiating_skills;
                 $user4->value_you_are_worth_for =$request->value_you_are_worth_for;
                 $user4->develop_new_skill_sets =$request->develop_new_skill_sets;
                 $user4->created_at =Carbon::now()->toDateTimeString();
                 $user4->save();
  

                  //   Physique
                  $user5->yoga =$request->yoga;
                  $user5->hit_the_gym =$request->hit_the_gym;
                  $user5->swimming =$request->swimming;
                  $user5->cycling =$request->cycling;
                  $user5->walking =$request->walking;
                  $user5->trekking =$request->trekking;
                  $user5->dancing =$request->dancing;
                  $user5->created_at =Carbon::now()->toDateTimeString();
                  $user5->save();


                  //   Environmental
                  $user6->environmental =$request->environmental;
                  $user6->personal_surrounding =$request->personal_surrounding;
                  $user6->recycling_trash =$request->recycling_trash;
                  $user6->grooming =$request->grooming;
                  $user6->personal_hyigeine =$request->personal_hyigeine;
                  $user6->nutrition =$request->nutrition;
                  $user6->detox =$request->detox;
                  $user6->created_at =Carbon::now()->toDateTimeString();
                  $user6->save();

            return response()->json([
                "status" => true,
                "message" => "Elite Petals Added!",
                // "user_id" => $user->user_id,
                // "Party Time" => $user->party_time,
                // "Music" => $user->music,
                // "Movie" => $user->movie,
                // "Dinner" => $user->dinner,
                // "Eat Out" => $user->eat_out,
                // "Play With Kids" => $user->play_with_kids,
                // "Friends Night Out" => $user->friends_night_out,

                // "Meditation" => $user1->meditation,
                // "Planned Solitude" => $user1->planned_solitude,
                // "Walk In Nature" => $user1->walk_in_nature,
                // "Contemplation" => $user1->contemplation,
                // "Prayer" => $user1->prayer,
                // "Devotional Song" => $user1->devotional_song,
                // "Visit to Religious Place" => $user1->visit_to_religious_place,

                // "Spend Time With Family" => $user2->spend_time_with_family,
                // "Be With Friend" => $user2->be_with_friend,
                // "Love Life" => $user2->love_life,
                // "Shower Emphathy" => $user2->shower_emphathy,
                // "Positive Feeling On Relation" => $user2->positive_feeling_on_relation,
                // "Positive Feeling With Colleagues" => $user2->positive_feeling_with_colleagues,
                // "Gratification" => $user2->gratification,

                // "Gaining Knowledge" => $user3->gaining_knowledge,
                // "Reading" => $user3->reading,
                // "Learning Language" => $user3->learning_language,
                // "Planning" => $user3->planning,
                // "Imagination" => $user3->imagination,
                // "Good Movie" => $user3->good_movie,
                // "Goals" => $user3->goals,

                // "Spend Time On Project" => $user4->spend_time_on_project,
                // "Planning for Financial Helth" => $user4->planning_for_financial_helth,
                // "saving " => $user4->saving,
                // "Investment " => $user4->investment,
                // "Negotiating Skills" => $user4->negotiating_skills,
                // "Value You Are Worth Of" => $user4->value_you_are_worth_for,
                // "Develop New Skill Sets" => $user4->develop_new_skill_sets,


                // "Yoga" => $user5->yoga,
                // "Hit The Gym" => $user5->hit_the_gym,
                // "Swimming" => $user5->swimming,
                // "Cycling" => $user5->cycling,
                // "Walking" => $user5->walking,
                // "Trekking" => $user5->trekking,
                // "Dancing" => $user5->dancing,

                // "Environmental" => $user6->environmental,
                // "Personal Surrounding" => $user6->personal_surrounding,
                // "Recycling Trash" => $user6->recycling_trash,
                // "Grooming and Carrying One Self" => $user6->grooming,
                // "Personal Hyigeine" => $user6->personal_hyigeine,
                // "Nutrition" => $user6->nutrition,
                // "Detox" => $user6->detox

            ]);

        }
        
        

    }




}
