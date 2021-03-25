<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stud_subject_covered extends Model
{
    use HasFactory;

    protected $table="stud_subject_covered";
    protected $fillable =[
     '*'
    ];
}
