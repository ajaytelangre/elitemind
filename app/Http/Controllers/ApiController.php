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
use App\Models\Loa_gratification;
use App\Models\My_mood;
use App\Models\Loa_lesson_of_day;
use App\Models\Loa_unique_things;
use App\Models\Loa_unproductive_task;
use Carbon\Carbon;
use App\Models\Celebrations;
use App\Models\Spirtuality;
use App\Models\Emotion;
use App\Models\Intellectual;
use App\Models\Skills;
use App\Models\Physique;
use App\Models\Environmental;
use Validator;

class ApiController extends Controller
{
    //
        // ------------------------------ Petals start

public function get_petals(Request $request){

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

       $spirtuality=Spirtuality::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();
      
       $emotion=Emotion::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();
       
       $intellectual=Intellectual::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();
       
       $skills=Skills::where('user_id',$id)
                        ->whereBetween('created_at', [$month_start, $month_end])
                        ->get();

       
    //  spirtuality

        $meditation=[];
        $planned_solitude=[];
        $walk_in_nature=[];
        $contemplation=[];
        $prayer=[];
        $devotional_song=[];
        $visit_to_religious_place=[];


        foreach($spirtuality as $i)
        {
            array_push($meditation,$i->meditation);
            array_push($planned_solitude,$i->planned_solitude);
            array_push($walk_in_nature,$i->walk_in_nature);
            array_push($contemplation,$i->contemplation);
            array_push($prayer,$i->prayer);
            array_push($devotional_song,$i->devotional_song);
            array_push($visit_to_religious_place,$i->visit_to_religious_place);
        }
        $meditation_count = array_count_values($meditation);
        if(in_array('y',$meditation)){
            $meditation_y_count=$meditation_count['y'];
        }
        else{
            $meditation_y_count=0;
        }
        $meditation_y_count;
        

    
        $plan_sol_count = array_count_values($planned_solitude); 
       if(in_array('y',$planned_solitude)){
        $plan_sol_y_count=$plan_sol_count['y'];
       }
       else{
        $plan_sol_y_count=0;
       }
       $plan_sol_y_count;
        


        $walk_nat_count = array_count_values($walk_in_nature);
        if(in_array('y',$walk_in_nature)){
            $walk_nat_y_count=$walk_nat_count['y'];
        }
        else{
            $walk_nat_y_count=0;
        }
        $walk_nat_y_count;
        

        // 
        $contemplation_count = array_count_values($contemplation);
        if(in_array('y',$contemplation)){
            $contemplation_y_count=$contemplation_count['y'];
        }
        else{
            $contemplation_y_count=0;
        }
        $contemplation_y_count;

        


        $prayer_count = array_count_values($prayer);
        if(in_array('y',$prayer)){
            $prayer_y_count=$prayer_count['y'];
        }
        else{
            $prayer_y_count=0;
        }
         $prayer_y_count;
        
        
        $devotional_song_count = array_count_values($devotional_song);
        if(in_array('y',$devotional_song)){
            $devotional_song_y_count=$devotional_song_count['y'];
        }
        else{
            $devotional_song_y_count=0;
        }
         $devotional_song_y_count;
        

       
        $religious_place_count = array_count_values($visit_to_religious_place); 
        if(in_array('y',$visit_to_religious_place)){
            $religious_place_y_count=$religious_place_count['y'];
        }
        else{
            $religious_place_y_count=0;
        }
       // return $spirtuality;
        $religious_place_y_count;
        

       $spirtuality_percentage = $meditation_y_count+$plan_sol_y_count+$walk_nat_y_count+$contemplation_y_count+$prayer_y_count+$devotional_song_y_count+$religious_place_y_count;
       // return $spirtuality_percentage;
         $total_spirtuality =(($spirtuality_percentage * 100)/(7*(int)$days));
        
    
    // spirtuality End

    //  emotion

        $spend_time_with_family=[];
        $be_with_friend=[];
        $love_life=[];
        $shower_emphathy=[];
        $positive_feeling_on_relation=[];
        $positive_feeling_with_colleagues=[];
        $gratification=[];


        foreach($emotion as $i)
        {
            array_push($spend_time_with_family,$i->spend_time_with_family);
            array_push($be_with_friend,$i->be_with_friend);
            array_push($love_life,$i->love_life);
            array_push($shower_emphathy,$i->shower_emphathy);
            array_push($positive_feeling_on_relation,$i->positive_feeling_on_relation);
            array_push($positive_feeling_with_colleagues,$i->positive_feeling_with_colleagues);
            array_push($gratification,$i->gratification);
        }
        $spend_time_with_family_count = array_count_values($spend_time_with_family);
        if(in_array('y',$spend_time_with_family)){
            $spend_time_with_family_y_count=$spend_time_with_family_count['y'];
        }
        else{
            $spend_time_with_family_y_count=0;
        }
         $spend_time_with_family_y_count;
        


        $be_with_friend_count = array_count_values($be_with_friend); 
       if(in_array('y',$be_with_friend)){
        $be_with_friend_y_count=$be_with_friend_count['y'];
       }
       else{
        $be_with_friend_y_count=0;
       }
       $be_with_friend_y_count;
        


        $love_life_count = array_count_values($love_life);
        if(in_array('y',$love_life)){
            $love_life_y_count=$love_life_count['y'];
        }
        else{
            $love_life_y_count=0;
        }
        $love_life_y_count;
        

        // 
        $shower_emphathy_count = array_count_values($shower_emphathy);
        if(in_array('y',$shower_emphathy)){
            $shower_emphathy_y_count=$shower_emphathy_count['y'];
        }
        else{
            $shower_emphathy_y_count=0;
        }
        $shower_emphathy_y_count;

        


        $positive_feeling_on_relation_count = array_count_values($positive_feeling_on_relation);
        if(in_array('y',$positive_feeling_on_relation)){
            $positive_feeling_on_relation_y_count=$positive_feeling_on_relation_count['y'];
        }
        else{
            $positive_feeling_on_relation_y_count=0;
        }
        $positive_feeling_on_relation_y_count;
        
        
        $positive_feeling_with_colleagues_count = array_count_values($positive_feeling_with_colleagues);
        if(in_array('y',$positive_feeling_with_colleagues)){
            $positive_feeling_with_colleagues_y_count=$positive_feeling_with_colleagues_count['y'];
        }
        else{
            $positive_feeling_with_colleagues_y_count=0;
        }
        $positive_feeling_with_colleagues_y_count;
        


        $gratification_count = array_count_values($gratification); 
        if(in_array('y',$gratification)){
            $gratification_y_count=$gratification_count['y'];
        }
        else{
            $gratification_y_count=0;
        }
        $gratification_y_count;
        

       $emotion_percentage = $spend_time_with_family_y_count+
                            $be_with_friend_y_count+
                            $love_life_y_count+
                            $shower_emphathy_y_count+
                            $positive_feeling_on_relation_y_count+
                            $positive_feeling_with_colleagues_y_count+
                            $gratification_y_count;

         $total_emotion =(($emotion_percentage * 100)/(7*(int)$days));
    
    // emotion End

    //  intellectual

        $gaining_knowledge=[];
        $reading=[];
        $learning_language=[];
        $planning=[];
        $imagination=[];
        $good_movie=[];
        $goals=[];


        foreach($intellectual as $i)
        {
            array_push($gaining_knowledge,$i->gaining_knowledge);
            array_push($reading,$i->reading);
            array_push($learning_language,$i->learning_language);
            array_push($planning,$i->planning);
            array_push($imagination,$i->imagination);
            array_push($good_movie,$i->good_movie);
            array_push($goals,$i->goals);
        }
        $gaining_knowledge_count = array_count_values($gaining_knowledge);
        if(in_array('y',$gaining_knowledge)){
            $gaining_knowledge_y_count=$gaining_knowledge_count['y'];
        }
        else{
            $gaining_knowledge_y_count=0;
        }
         $gaining_knowledge_y_count;
        


        $reading_count = array_count_values($reading); 
       if(in_array('y',$reading)){
        $reading_y_count=$reading_count['y'];
       }
       else{
        $reading_y_count=0;
       }
       $reading_y_count;
        


        $learning_language_count = array_count_values($learning_language);
        if(in_array('y',$learning_language)){
            $learning_language_y_count=$learning_language_count['y'];
        }
        else{
            $learning_language_y_count=0;
        }
        $learning_language_y_count;
        

        // 
        $planning_count = array_count_values($planning);
        if(in_array('y',$planning)){
            $planning_y_count=$planning_count['y'];
        }
        else{
            $planning_y_count=0;
        }
        $planning_y_count;

        


        $imagination_count = array_count_values($imagination);
        if(in_array('y',$imagination)){
            $imagination_y_count=$imagination_count['y'];
        }
        else{
            $imagination_y_count=0;
        }
        $imagination_y_count;
        
        
        $good_movie_count = array_count_values($good_movie);
        if(in_array('y',$good_movie)){
            $good_movie_y_count=$good_movie_count['y'];
        }
        else{
            $good_movie_y_count=0;
        }
        $good_movie_y_count;
        


        $goals_count = array_count_values($goals); 
        if(in_array('y',$goals)){
            $goals_y_count=$goals_count['y'];
        }
        else{
            $goals_y_count=0;
        }
        $goals_y_count;
        

       $intellectual_percentage = $gaining_knowledge_y_count+
                            $reading_y_count+
                            $learning_language_y_count+
                            $planning_y_count+
                            $imagination_y_count+
                            $good_movie_y_count+
                            $goals_y_count;

         $total_intellectual =(($intellectual_percentage * 100)/(7*(int)$days));
    
    // intellectual End

    //  skills

        $spend_time_on_project=[];
        $planning_for_financial_helth=[];            
        $saving=[];
        $develop_new_skill_sets=[];
        $investment=[];
        $negotiating_skills=[];
        $value_you_are_worth_for=[];
        $develop_new_skill_sets=[];

        foreach($skills as $i)
        {
            array_push($spend_time_on_project,$i->spend_time_on_project);
            array_push($planning_for_financial_helth,$i->planning_for_financial_helth);
            array_push($saving,$i->saving);                
            array_push($investment,$i->investment);
            array_push($negotiating_skills,$i->negotiating_skills);
            array_push($value_you_are_worth_for,$i->value_you_are_worth_for);
            array_push($develop_new_skill_sets,$i->develop_new_skill_sets);
        }
        $spend_time_on_project_count = array_count_values($spend_time_on_project);
        if(in_array('y',$spend_time_on_project)){
            $spend_time_on_project_y_count=$spend_time_on_project_count['y'];
        }
        else{
            $spend_time_on_project_y_count=0;
        }
         $spend_time_on_project_y_count;
        


        $planning_for_financial_helth_count = array_count_values($planning_for_financial_helth); 
       if(in_array('y',$planning_for_financial_helth)){
        $planning_for_financial_helth_y_count=$planning_for_financial_helth_count['y'];
       }
       else{
        $planning_for_financial_helth_y_count=0;
       }
       $planning_for_financial_helth_y_count;
     
     
      
       $saving_count = array_count_values($saving); 
       if(in_array('y',$saving)){
        $saving_y_count=$saving_count['y'];
       }
       else{
            $saving_y_count=0;
       }
       $saving_y_count;
                    

        $investment_count = array_count_values($investment);
        //return $investment_count;
        if(in_array('y',$investment)){
            $investment_y_count=$investment_count['y'];
        }
        else{
            $investment_y_count=0;
        }
        $investment_y_count;
        


        $negotiating_skills_count = array_count_values($negotiating_skills);
        if(in_array('y',$negotiating_skills)){
            $negotiating_skills_y_count=$negotiating_skills_count['y'];
        }
        else{
            $negotiating_skills_y_count=0;
        }
        $negotiating_skills_y_count;
        
        
        $value_you_are_worth_for_count = array_count_values($value_you_are_worth_for);
        if(in_array('y',$value_you_are_worth_for)){
            $value_you_are_worth_for_y_count=$value_you_are_worth_for_count['y'];
        }
        else{
            $value_you_are_worth_for_y_count=0;
        }
        $value_you_are_worth_for_y_count;
        


        $develop_new_skill_sets_count = array_count_values($develop_new_skill_sets); 
        if(in_array('y',$develop_new_skill_sets)){
            $develop_new_skill_sets_y_count=$develop_new_skill_sets_count['y'];
        }
        else{
            $develop_new_skill_sets_y_count=0;
        }
        $develop_new_skill_sets_y_count;
        

       $skills_percentage = $spend_time_on_project_y_count+
                            $planning_for_financial_helth_y_count+
                            $saving_y_count+
                            $investment_y_count+
                            $negotiating_skills_y_count+
                            $value_you_are_worth_for_y_count+
                            $develop_new_skill_sets_y_count;

         $total_skills =(($skills_percentage * 100)/(7*(int)$days));
    
    // skills End


     //  celebration

     $party_time=[];
     $music=[];
     $movie=[];
     $dinner=[];
     $eat_out=[];
     $play_with_kids=[];
     $friends_night_out=[];

     $celebration=Celebrations::where('user_id',$id)
     ->whereBetween('created_at', [$month_start, $month_end])
     ->get();



     foreach($celebration as $i)
     {
         array_push($party_time,$i->party_time);
         array_push($music,$i->music);
         array_push($movie,$i->movie);
         array_push($dinner,$i->dinner);
         array_push($eat_out,$i->eat_out);
         array_push($play_with_kids,$i->play_with_kids);
         array_push($friends_night_out,$i->friends_night_out);
     }
     $party_count = array_count_values($party_time);
     if(in_array('y',$party_time)){
         $party_y_count=$party_count['y'];
     }
     else{
         $party_y_count=0;
     }
     
     

 
     $music_count = array_count_values($music); 
    if(in_array('y',$music)){
     $music_y_count=$music_count['y'];
    }
    else{
     $music_y_count=0;
    }
  
     


     $movie_count = array_count_values($movie);
     if(in_array('y',$movie)){
         $movie_y_count=$movie_count['y'];
     }
     else{
         $movie_y_count=0;
     }
    
     

     // 
     $dinner_count = array_count_values($dinner);
     if(in_array('y',$dinner)){
         $dinner_y_count=$dinner_count['y'];
     }
     else{
         $dinner_y_count=0;
     }
     

     


     $eat_out_count = array_count_values($eat_out);
     if(in_array('y',$eat_out)){
         $eat_y_count=$eat_out_count['y'];
     }
     else{
         $eat_y_count=0;
     }
    
     
     
     $play_with_kids_count = array_count_values($play_with_kids);
     if(in_array('y',$play_with_kids)){
         $play_with_kids_y_count=$play_with_kids_count['y'];
     }
     else{
         $play_with_kids_y_count=0;
     }
     
     

    
     $friends_night_out_count = array_count_values($friends_night_out); 
     if(in_array('y',$friends_night_out)){
         $friends_night_out_y_count=$friends_night_out_count['y'];
     }
     else{
         $friends_night_out_y_count=0;
     }
    
    
     

    $celebration_percentage = $party_y_count+$music_y_count+$movie_y_count+$dinner_y_count+$prayer_y_count+$play_with_kids_y_count+$friends_night_out_y_count;
    // return $spirtuality_percentage;
      $total_celebration =(($celebration_percentage * 100)/(7*(int)$days));
     
 
 // celebration End


 
     //  pysique

     $yoga=[];
     $hit_the_gym=[];
     $swimming=[];
     $cycling=[];
     $walking=[];
     $trekking=[];
     $dancing=[];

     $physique=Physique::where('user_id',$id)
     ->whereBetween('created_at', [$month_start, $month_end])
     ->get();



     foreach($physique as $i)
     {
         array_push($yoga,$i->yoga);
         array_push($hit_the_gym,$i->hit_the_gym);
         array_push($swimming,$i->swimming);
         array_push($cycling,$i->cycling);
         array_push($walking,$i->walking);
         array_push($trekking,$i->trekking);
         array_push($dancing,$i->dancing);
     }
     $yoga_count = array_count_values($yoga);
     if(in_array('y',$yoga)){
         $yoga_y_count=$yoga_count['y'];
     }
     else{
         $yoga_y_count=0;
     }
  
     
     

 
     $hit_the_gym_count = array_count_values($hit_the_gym); 
    if(in_array('y',$hit_the_gym)){
     $hit_the_gym_y_count=$hit_the_gym_count['y'];
    }
    else{
     $hit_the_gym_y_count=0;
    }
 
  
     


     $swimming_count = array_count_values($swimming);
     if(in_array('y',$swimming)){
         $swimming_y_count=$swimming_count['y'];
     }
     else{
         $swimming_y_count=0;
     }
    
     

     // 
     $cycling_count = array_count_values($cycling);
     if(in_array('y',$cycling)){
         $cycling_y_count=$cycling_count['y'];
     }
     else{
         $cycling_y_count=0;
     }
     
     

     


     $walking_count = array_count_values($walking);
     if(in_array('y',$walking)){
         $walking_y_count=$walking_count['y'];
     }
     else{
         $walking_y_count=0;
     }
     
    
     
     
     $trekking_count = array_count_values($trekking);
     if(in_array('y',$trekking)){
         $trekking_y_count=$trekking_count['y'];
     }
     else{
         $trekking_y_count=0;
     }
     
     

    
     $dancing_count = array_count_values($dancing); 
     if(in_array('y',$dancing)){
         $dancing_y_count=$dancing_count['y'];
     }
     else{
         $dancing_y_count=0;
     }
     
    
    
     

    $pysique_percentage = $yoga_y_count+$hit_the_gym_y_count+$swimming_y_count+$cycling_y_count+$walking_y_count+$trekking_y_count+$dancing_y_count;
    // return $spirtuality_percentage;
      $total_pysique =(($pysique_percentage * 100)/(7*(int)$days));
     
 
 // pysique End



 
     //  environmental

     $environmental=[];
     $personal_surrounding=[];
     $recycling_trash=[];
     $grooming=[];
     $personal_hyigeine=[];
     $nutrition=[];
     $detox=[];

     $envir=Environmental::where('user_id',$id)
     ->whereBetween('created_at', [$month_start, $month_end])
     ->get();



     foreach($envir as $i)
     {
         array_push($environmental,$i->environmental);
         array_push($personal_surrounding,$i->personal_surrounding);
         array_push($recycling_trash,$i->recycling_trash);
         array_push($grooming,$i->grooming);
         array_push($personal_hyigeine,$i->personal_hyigeine);
         array_push($nutrition,$i->nutrition);
         array_push($detox,$i->detox);
     }
     $environmental_count = array_count_values($environmental);
     if(in_array('y',$environmental)){
         $environmental_y_count=$environmental_count['y'];
     }
     else{
         $environmental_y_count=0;
     }
     
  
     
     

 
     $personal_surrounding_count = array_count_values($personal_surrounding); 
    if(in_array('y',$personal_surrounding)){
     $personal_surrounding_y_count=$personal_surrounding_count['y'];
    }
    else{
     $personal_surrounding_y_count=0;
    }
   
  
     


     $recycling_trash_count = array_count_values($recycling_trash);
     if(in_array('y',$recycling_trash)){
         $recycling_trash_y_count=$recycling_trash_count['y'];
     }
     else{
         $recycling_trash_y_count=0;
     }

    
    
     

     // 
     $grooming_count = array_count_values($grooming);
     if(in_array('y',$grooming)){
         $grooming_y_count=$grooming_count['y'];
     }
     else{
         $grooming_y_count=0;
     }
    
     

     


     $personal_hyigeine_count = array_count_values($personal_hyigeine);
     if(in_array('y',$personal_hyigeine)){
         $personal_hyigeine_y_count=$personal_hyigeine_count['y'];
     }
     else{
         $personal_hyigeine_y_count=0;
     }
    
     
    
     
     
     $nutrition_count = array_count_values($nutrition);
     if(in_array('y',$nutrition)){
         $nutrition_y_count=$nutrition_count['y'];
     }
     else{
         $nutrition_y_count=0;
     }
     
     
     

    
     $detox_count = array_count_values($detox); 
     if(in_array('y',$detox)){
         $detox_y_count=$detox_count['y'];
     }
     else{
         $detox_y_count=0;
     }
     
     
    
    
     

    $environmental_percentage = $environmental_y_count+$personal_surrounding_y_count+$recycling_trash_y_count+$grooming_y_count+$personal_hyigeine_y_count+$nutrition_y_count+$detox_y_count;
    
      $total_environmental =(($environmental_percentage * 100)/(7*(int)$days));
     
 
 // environmental End


        return response()->json([
            "spirtuality"=>$total_spirtuality,                             
            "emotion"=>$total_emotion,                             
            "intellectual"=>$total_intellectual,                             
            "skills"=>$total_skills,  
            "cellebration"=>$total_celebration,
            "pysique"=>$total_pysique,  
            "environmental"=>$total_environmental,                              
        ]);

    }

}

// ------------------------------ Petals End


    public function insert_loa_unproductive_task(Request $request){

        $validatedData=Validator::make($request->all(),[
            "register_id"=>"required",
            "unproductive_task"=>"required"

        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail",
                "status"=>"false"
            ]);
        }
        else{
            $id=$request->register_id;
            $c_date=date("Y-m-d");
            $info=Loa_unproductive_task::where('register_id',$id)
                                ->whereDate('created','=',$c_date)
                                ->first();
            if($info){
                $user=Loa_unproductive_task::where('register_id',$id)->first();
            }
            else{
                $user=new Loa_unproductive_task;
                $user->register_id=$request->register_id;
               
            }

            $user->unproductive_task =$request->unproductive_task;
            $user->created =Carbon::now()->toDateTimeString();
            $user->save();

            return response()->json([
                "status" => true,
                "message" => "unproductive_task  Added!",
                "register_id" => $user->register_id,
                "Unproductive task" => $user->unproductive_task
            ]);

        }
        
        

    }


    public function insert_loa_how_was_day(Request $request){

        $validatedData=Validator::make($request->all(),[
            "register_id"=>"required",
            "loa_how_was_day"=>"required"

        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail",
                "status"=>"false"
            ]);
        }
        else{
            $id=$request->register_id;
            $c_date=date("Y-m-d");
            $info=Loa_how_was_day::where('register_id',$id)
                                ->whereDate('created','=',$c_date)
                                ->first();
            if($info){
                $loa_how_was_day_obj=Loa_how_was_day::where('register_id',$id)->first();
            }
            else{
                $loa_how_was_day_obj=new Loa_how_was_day;
                $loa_how_was_day_obj->register_id=$request->register_id;
               
            }

            $loa_how_was_day_obj->loa_how_was_day =$request->loa_how_was_day;
            $loa_how_was_day_obj->created =Carbon::now()->toDateTimeString();
            $loa_how_was_day_obj->save();

            return response()->json([
                "status" => true,
                "message" => "loa_how_was_day Statement Added!",
                "register_id" => $loa_how_was_day_obj->register_id,
                "loa_how_was_day Statement" => $loa_how_was_day_obj->loa_how_was_day
            ]);

        }
        
        

    }





    public function insert_unique_things(Request $request){

        $validatedData=Validator::make($request->all(),[
            "register_id"=>"required",

        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail",
                "status"=>"false"
            ]);
        }
        else{
            $id=$request->register_id;
            $c_date=date("Y-m-d");
            $info=Loa_unique_things::where('register_id',$id)
                                ->whereDate('created','=',$c_date)
                                ->first();
            if($info){
                $uniqueThings=Loa_unique_things::where('register_id',$id)->first();
                $uniqueThings->unique_things_1 = $request->unique_things_1;
                $uniqueThings->unique_things_2 = $request->unique_things_2;
                $uniqueThings->unique_things_3 = $request->unique_things_3;
                $uniqueThings->unique_things_4 = $request->unique_things_4;
                $uniqueThings->unique_things_5 = $request->unique_things_5;
                $uniqueThings->save();
                return response()->json([
                    "message" => "Unique 5 Things Updated!",
                    "register_id" => $uniqueThings->register_id,
                    "Unique Things" => $uniqueThings->unique_things_1,
                    "status"=>"true"
                ]);
            }
            else{
                $uniqueThings=new Loa_unique_things;
                $uniqueThings->register_id=$request->register_id;
                $uniqueThings->unique_things_1 = $request->unique_things_1;
                $uniqueThings->unique_things_2 = $request->unique_things_2;
                $uniqueThings->unique_things_3 = $request->unique_things_3;
                $uniqueThings->unique_things_4 = $request->unique_things_4;
                $uniqueThings->unique_things_5 = $request->unique_things_5;
                $uniqueThings->created=Carbon::now()->toDateTimeString();
                $uniqueThings->save();
                return response()->json([
                    "message" => "Unique 5 Things Added!",
                    "register_id" => $uniqueThings->register_id,
                    "Unique Things" => $uniqueThings->unique_things_1,
                    "status"=>"true"
                ]);
            }

        }
        

    }


    public function insert_loa_lessons_of_day(Request $request){

        $validatedData=Validator::make($request->all(),[
            "register_id"=>"required",
            "lesson_of_day"=>"required"
        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail",
                "status"=>"false"
            ]);
        }
        else{
            $id=$request->register_id;
            $c_date=date("Y-m-d");
            $info=Loa_lesson_of_day::where('register_id',$id)
                                ->whereDate('created','=',$c_date)
                                ->first();
            if($info){
                $user=Loa_lesson_of_day::where('register_id',$id)->first();
                $user->lesson_of_day=$request->lesson_of_day;
                $user->save();
                return response()->json([
                    "message"=>"data updated",
                    "status"=>"true"
                ]);
            }
            else{
                $user=new Loa_lesson_of_day;
                $user->register_id=$request->register_id;
                $user->lesson_of_day=$request->lesson_of_day;
                $user->created=Carbon::now()->toDateTimeString();
                $user->save();
                return response()->json([
                    "message"=>"data inserted",
                    "status"=>"true"
                ]);
            }

        }
        

    }




    public function set_mood(Request $request){

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
            $info=My_mood::where('user_id',$id)
                                ->whereDate('created_at','=',$c_date)
                                ->first();
            if($info){
                $user=My_mood::where('user_id',$id)->first();
                $user->angry=$request->angry;
                $user->anxious=$request->anxious;
                $user->energetic=$request->energetic;
                $user->calm=$request->calm;
                $user->depressed=$request->depressed;
                $user->active=$request->active;
                $user->happy=$request->happy;
                $user->exhausted=$request->exhausted;
                $user->stressed=$request->stressed;
                $user->normal=$request->normal;
                $user->save();
                return response()->json([
                    "message"=>"data updated"
                ]);
            }
            else{
                $user=new My_mood;
                $user->user_id=$request->user_id;
                $user->angry=$request->angry;
                $user->anxious=$request->anxious;
                $user->energetic=$request->energetic;
                $user->calm=$request->calm;
                $user->depressed=$request->depressed;
                $user->active=$request->active;
                $user->happy=$request->happy;
                $user->exhausted=$request->exhausted;
                $user->stressed=$request->stressed;
                $user->normal=$request->normal;
                $user->save();
                return response()->json([
                    "message"=>"data inserted"
                ]);
            }
            


        }
        

    }




    public function set_loa_gratification(Request $request){

        $validatedData=Validator::make($request->all(),[
            "gratification"=>"required",
            "register_id"=>"required"
        ]);

        if($validatedData->fails())
        {
            return response()->json([
                "message"=>"validation fail",
                "status"=>"false"
            ]);
        }
        else{
            $id=$request->register_id;
            
            $c_date=date("Y-m-d");
            $info=Loa_gratification::where('register_id',$id)
                                ->whereDate('created','=',$c_date)
                                ->first();
            if($info){
                $user=Loa_gratification::where('register_id',$id)->first();
                $user->gratification=$request->gratification;
                $user->save();
                return response()->json([
                    "message"=>"data updated",
                    "status"=>"true"
                ]);
            }
            else{

                $user=new Loa_gratification;
                $user->register_id=$id;
                $user->gratification=$request->gratification;
                $user->created=Carbon::now()->toDateTimeString();
               
                $user->save();
                return response()->json([
                    "message"=>"data inserted",
                    "status"=>"true"
                ]);
            }
            


        }
        

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
            $info=Loa_90_day_goals::where('register_id',$id)->first();
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
            $info=Loa_30_day_goals::where('register_id',$id)->first();
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


    
    public function get_30day_mood(Request $request){

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
            
                $register=Register::select('month_start','month_end')
                                    ->where('id',$id)
                                    ->first();

                $month_start=$register->month_start;
                $month_end=$register->month_end;
            
         

            $info=My_mood::where('user_id',$id)
                            ->whereBetween('created_at', [$month_start, $month_end])
                            ->get();
            $angry=[];
            $anxious=[];
            $energetic=[];
            $calm=[];
            $depressed=[];
            $active=[];
            $happy=[];
            $exhausted=[];
            $stressed=[];
            $normal=[];
            foreach($info as $i)
            {
                array_push($angry,$i->angry);
                array_push($anxious,$i->anxious);
                array_push($energetic,$i->energetic);
                array_push($calm,$i->calm);
                array_push($depressed,$i->depressed);
                array_push($active,$i->active);
                array_push($happy,$i->happy);
                array_push($exhausted,$i->exhausted);
                array_push($stressed,$i->stressed);
                array_push($normal,$i->normal);
            }
            $angry_count = array_count_values($angry);
            if(in_array('y',$angry)){
                $angry_y_count=$angry_count['y'];
            }
            else{
                $angry_y_count=0;
            }
            $angry_percent=round($this->percent($angry_y_count,$days), 2);


            $anxious_count = array_count_values($anxious); 
           if(in_array('y',$anxious)){
            $anxious_y_count=$anxious_count['y'];
           }
           else{
            $anxious_y_count=0;
           }
            $anxious_percent=round($this->percent($anxious_y_count,$days), 2);


            $energetic_count = array_count_values($energetic);
            if(in_array('y',$energetic)){
                $energetic_y_count=$energetic_count['y'];
            }
            else{
                $energetic_y_count=0;
            }
            $energetic_percent=round($this->percent($energetic_y_count,$days), 2);

            
            $calm_count = array_count_values($calm);
            if(in_array('y',$calm)){
                $calm_y_count=$calm_count['y'];
            }
            else{
                $calm_y_count=0;
            }
            $calm_percent=round($this->percent($calm_y_count,$days), 2);



            $depressed_count = array_count_values($depressed);
            if(in_array('y',$depressed)){
                $depressed_y_count=$depressed_count['y'];
            }
            else{
                $depressed_y_count=0;
            }
            $depressed_percent=round($this->percent($depressed_y_count,$days), 2);


            
            $active_count = array_count_values($active);
            if(in_array('y',$active)){
                $active_y_count=$active_count['y'];
            }
            else{
                $active_y_count=0;
            }
            $active_percent=round($this->percent($active_y_count,$days), 2);


            $happy_count = array_count_values($happy);
            if(in_array('y',$happy)){
                $happy_y_count=$happy_count['y'];
            }
            else{
                $happy_y_count=0;
            }
            $happy_percent=round($this->percent($happy_y_count,$days), 2);



            
            $exhausted_count = array_count_values($exhausted);
            if(in_array('y',$happy)){
                $exhausted_y_count=$exhausted_count['y'];
            }
            else{
                $exhausted_y_count=0;
            }
            $exhausted_percent=round($this->percent($exhausted_y_count,$days), 2);


            
            $stressed_count = array_count_values($stressed);
            if(in_array('y',$stressed)){
                $stressed_y_count=$stressed_count['y'];
            }
            else{
                $stressed_y_count=0;
            }
            $stressed_percent=round($this->percent($stressed_y_count,$days), 2);



            
            $normal_count = array_count_values($normal);
            if(in_array('y',$normal)){
                $normal_y_count=$normal_count['y'];
            }
            else{
                $normal_y_count=0;
            }
            $normal_percent=round($this->percent($normal_y_count,$days), 2);



            return response()->json([
                "angry"=>$angry_percent,
                "anxious"=>$anxious_percent,
                "energetic"=>$energetic_percent,
                "calm"=>$calm_percent,
                "depressed"=>$depressed_percent,
                "active"=>$active_percent,
                "happy"=>$happy_percent,
                "exhausted"=>$exhausted_percent,
                "stressed"=>$stressed_percent,
                "normal"=>$normal_percent
            ]);
         


        }

    }

    
    public function get_loa_daily_planner(Request $request){

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
            $m_vis_percent=round($this->percent($m_vis_y_count,$days), 2);


            $ninety_count = array_count_values($ninety_day_goal); 
           if(in_array('y',$ninety_day_goal)){
            $ninety_y_count=$ninety_count['y'];
           }
           else{
            $ninety_y_count=0;
           }
            $ninety_percent=round($this->percent($ninety_y_count,$days), 2);


            $thirty_count = array_count_values($thirty_day_goal);
            if(in_array('y',$thirty_day_goal)){
                $thirty_y_count=$thirty_count['y'];
            }
            else{
                $thirty_y_count=0;
            }
            $thirty_percent=round($this->percent($thirty_y_count,$days), 2);

            
            $today_count = array_count_values($plan_for_today);
            if(in_array('y',$plan_for_today)){
                $today_y_count=$today_count['y'];
            }
            else{
                $today_y_count=0;
            }
            $today_percent=round($this->percent($today_y_count,$days), 2);



            $steal_count = array_count_values($steal_one_hour);
            if(in_array('y',$steal_one_hour)){
                $steal_y_count=$steal_count['y'];
            }
            else{
                $steal_y_count=0;
            }
            $steal_percent=round($this->percent($steal_y_count,$days), 2);


            
            $focus_count = array_count_values($focus_160_minute);
            if(in_array('y',$focus_160_minute)){
                $focus_y_count=$focus_count['y'];
            }
            else{
                $focus_y_count=0;
            }
            $focus_percent=round($this->percent($focus_y_count,$days), 2);


            $time_count = array_count_values($time_for_gratification);
            if(in_array('y',$time_for_gratification)){
                $time_y_count=$time_count['y'];
            }
            else{
                $time_y_count=0;
            }
            $time_percent=round($this->percent($time_y_count,$days), 2);



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

    public function percent($y,$d){
        $per=($y*100)/(int)$d;
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
