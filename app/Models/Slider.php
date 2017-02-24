<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //

     protected $fillable = [
        'title', 'subtitle', 'caption','url',
        'status','slug','animation','caption_position'
    ];

    protected $morphClass = 'Slider';

     /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne( 'App\Models\Image', 'imageable' );
    }
}
