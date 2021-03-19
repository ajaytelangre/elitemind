<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class SchedulerController extends Controller
{
    //
    public function set_month_end(){
        $register=Register::select()->get();
    }
}
