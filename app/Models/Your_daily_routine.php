<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Your_daily_routine extends Model
{
    use HasFactory;
    protected $table="your_daily_routine";
    protected $fillable = [
        '*'
    ];
    public $timestamps = false;

}
