<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loa_how_was_day extends Model
{
    use HasFactory;

    protected $table="loa_how_was_day";
    protected $fillable = [
        '*'
    ];
    public $timestamps = false;

}
