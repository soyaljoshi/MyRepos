<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Popular extends Model
{
    //

     protected $fillable = [
        'title', 'subtitle', 'description', 'status','url'
    ];

    protected $morphClass = 'Populartest';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne( 'App\Models\Image', 'imageable' );
    }
}
