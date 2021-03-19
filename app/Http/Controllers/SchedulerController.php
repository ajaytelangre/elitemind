<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Carbon\Carbon;

class SchedulerController extends Controller
{
    //
    public function set_month_end(){
        $register=Register::select('id','month_start','month_end')
                            ->get();
        $current_date=Carbon::now()->format('Y-m-d');
        foreach($register as $r){
            
            $month_end=substr($r->month_end,0,10);
            if($current_date==$month_end){
                $users=Register::find($r->id);
                $users->month_start=$r->month_end;
                $users->month_end=Carbon::now()->addDays(30);
                $users->save();
                 
            }
         
        }
       
    }
}
