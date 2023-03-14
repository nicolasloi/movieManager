<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // Table name
    protected $table = 'movies';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
