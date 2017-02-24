<?php

namespace App\Models;

use App\Services\Parsedowner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Departments extends Model
{
    //

    protected $fillable = [
        'title', 'sub_title', 'desc',
        'slug', 'status','isClinical','displayOrder','url'
    ];


     protected $morphClass = 'Departments';

    public function image()
    {
        return $this->morphOne( 'App\Models\Image', 'imageable' );
    }

    public function getDepartments($id){

     $titleName =  Departments::select('title')->where('id',$id)->get();
     // dd($titleName);
     foreach ($titleName as $key => $name) {
        return $name->title;
     }
    }
    public function getNameDepartment($id){

     $titleName =  Departments::select('title')->where('slug',$id)->get();
     // dd($titleName);
     foreach ($titleName as $key => $name) {
        return $name->title;
     }
    }

    
}
