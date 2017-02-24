<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //

      protected $fillable = [
        'title', 'slug', 'description',
        'status'
    ];


     protected $morphClass = 'gallery';

    public function image()
    {
        return $this->morphToMany( 'App\Models\Image', 'imageable' );
    }
}
