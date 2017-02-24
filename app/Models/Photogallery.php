<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photogallery extends Model
{
    //

	

     protected $morphClass = 'Photogallery';

      /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {

        return $this->morphToMany( 'App\Models\Image', 'imageable' );
    }


}
 