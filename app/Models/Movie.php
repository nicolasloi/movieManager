<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Movie extends Model
{
    use Searchable;

    // Table name
    protected $table = 'movies';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    /**
     * Get the user that owns the movie.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
