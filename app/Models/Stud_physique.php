<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stud_physique extends Model
{
    use HasFactory;
    protected $table="stud_physiques";
    protected $fillables=[
     '*'
    ];
}
