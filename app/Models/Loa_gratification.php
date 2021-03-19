<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loa_gratification extends Model
{
    use HasFactory;

    protected $table="loa_gratification";
    protected $fillable = [
        '*'
    ];
    public $timestamps = false;
}
