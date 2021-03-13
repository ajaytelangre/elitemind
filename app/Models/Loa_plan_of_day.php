<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loa_plan_of_day extends Model
{
    use HasFactory;

    protected $table="loa_plan_of_day";
    protected $fillable = [
        '*'
    ];
    public $timestamps = false;
}
