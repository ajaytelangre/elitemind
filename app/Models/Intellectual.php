<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intellectual extends Model
{
    use HasFactory;
    protected $table="intellectuals";
    protected $fillable = [
        '*'
    ];
}
