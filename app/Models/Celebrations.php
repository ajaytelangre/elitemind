<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celebrations extends Model
{
    use HasFactory;
    protected $table="celebrations";
    protected $fillable = [
        '*'
    ];
}
