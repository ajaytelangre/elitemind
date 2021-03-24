<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spirtuality extends Model
{
    use HasFactory;
    protected $table="spirtualitys";
    protected $fillables=[
        "*"
    ];
}
