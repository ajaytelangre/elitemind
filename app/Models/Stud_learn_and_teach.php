<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stud_learn_and_teach extends Model
{
    use HasFactory;
    protected $table="stud_learnandteachs";
    protected $fillable = [
        '*'
    ];
}

