<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class Staffmanagement extends Model
{
    //

     protected $fillable = [
        'name', 'department', 'desc','designation',
        'slug','order','division','view_photo','status','view_professional'
    ];


     protected $morphClass = 'Staffmanagement';

    public function image()
    {
        return $this->morphOne( 'App\Models\Image', 'imageable' );
    }

    // public function getStaff($dept = null)
    // {
       

    //   $did= DB::table('departments')
    //             ->where('slug',$dept)
    //             ->select('id')
    //             ->orderBy('displayOrder','asc')
    //             ->get();

    //   foreach ($did as $key => $value) {
           
    //   $staff= DB::table('staffmanagements')
    //             ->where('department',$value->id)
    //             ->select()
    //             ->orderBy('order','asc')
    //             ->get();
       
    //   return $staff;
    //   }
    // }

    // public function getstaffall($dept = null){


    //    $staff= DB::table('staffmanagements')
    //                   ->where('department',$dept)
    //                   ->select()
    //                    ->orderBy('order','asc')
    //                   ->get();
             
    //         return $staff;

    // }

    public function getStaff($dept = null)
    {
       

      $did= DB::table('divisions')
                ->where('slug',$dept)
                ->select('id')
                ->orderBy('hierarchy','asc')
                ->get();

      foreach ($did as $key => $value) {
           
      $staff= DB::table('staffmanagements')
                ->where('division',$value->id)
                ->where('status',1)
                ->select()
                ->orderBy('order','asc')
                ->get();
       
      return $staff;
      }
    }

    public function getstaffall($dept = null){


       $staff= DB::table('staffmanagements')
                      ->where('division',$dept)
                      ->where('status',1)
                      ->select()
                      ->orderBy('order','asc')
                      ->get();
             
            return $staff;

    }
}
