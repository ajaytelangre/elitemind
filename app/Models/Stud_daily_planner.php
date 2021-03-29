<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stud_daily_planner extends Model
{
    use HasFactory;
    protected $table="stud_daily_planners";
    protected $fillables=[
     '*'
    ];
}
