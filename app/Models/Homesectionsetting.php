<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homesectionsetting extends Model
{
    //

     protected $fillable = [
        'title', 'subtitle', 'description',
        'status'
    ];


     protected $morphClass = 'Homesectionsetting';

    public function image()
    {
        return $this->morphOne( 'App\Models\Image', 'imageable' );
    }
}
