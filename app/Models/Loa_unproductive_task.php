<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loa_unproductive_task extends Model
{
    use HasFactory;
    protected $table= "loa_unproductive_task";
    protected $fillable = [
        '*'
    ];
    public $timestamps = false;

}
