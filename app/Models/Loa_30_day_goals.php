<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loa_30_day_goals extends Model
{
    use HasFactory;
    protected $table="loa_30_day_goals";
    protected $fillable = [
        '*'
    ];
    public $timestamps = false;
}
