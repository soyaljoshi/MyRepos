<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'hierarchy'
    ];

    /**
     * Get the posts relationship.
     *
     * @return BelongsToMany
     */
    public function getNameDivision($id){

     $titleName =  Division::select('name')->where('slug',$id)->get();
     foreach ($titleName as $key => $title) {
        return $title->name;
     }
    }


}
