<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loa_unique_things extends Model
{
    use HasFactory;

    protected $table="loa_unique_things";
    protected $fillable = [
        '*'
    ];
    public $timestamps = false;
}
