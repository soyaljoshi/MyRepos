<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\Departments;
use App\Models\Division;
use DB;

class MenuManager
{

  // public $username;
    
    // public function mymenu()
    // {
    // $menu = Menu::select()->where('parent_id','0')->orderBy('order')->get();
    // return $menu;
    // }

    // public function submenu(){
    //   $submenus = [];

    //   $menu = $this->mymenu();
    //   foreach ($menu as $key => $menus) {
    //           $a = DB::select(DB::raw("select * from menus where parent_id = $menus->id"));
    //           if (!empty($a)) {
    //             $submenus[$menus['id']]= $a;
    //           }
    //         }
    //   return $submenus;  
    // }

    // public function grandmenu(){
    //   $submenus = $this->submenu();
    //   $grandmenu = [];
    //   foreach ($submenus  as $keys => $smenu){
    //       foreach ($smenu  as $keyss => $submenu){
    //          $a = DB::select(DB::raw("select * from menus where parent_id = $submenu->id"));
    //           if (!empty($a)) {
    //             $grandmenu[$submenu->id]= $a;
    //           }
    //       }
    //   }
    //   return $grandmenu;
    // }

    // // public function department(){
    
    // // $department = Departments::select()->where('status','1')->where('isClinical','1')->orderBy('displayOrder','asc')->get();

    // // return $department;
    // // }
    // public function division(){
    
    // $division = Division::select()->orderBy('hierarchy','asc')->get();

    // return $division;
    // }


// public $username;
    
    public function mymenu()
    {
    $menu = Menu::select()->where('parent_id','0')->orderBy('order')->get();
    return $menu;
    }

    public function submenu(){
      $submenus = [];

      $menu = $this->mymenu();
      foreach ($menu as $key => $menus) {
              $a = DB::select(DB::raw("select * from menus where parent_id = $menus->id"));
              if (!empty($a)) {
                $submenus[$menus['id']]= $a;
              }
            }
      return $submenus;  
    }

    public function grandmenu(){
      $submenus = $this->submenu();
      $grandmenu = [];
      foreach ($submenus  as $keys => $smenu){
          foreach ($smenu  as $keyss => $submenu){
             $a = DB::select(DB::raw("select * from menus where parent_id = $submenu->id"));
              if (!empty($a)) {
                $grandmenu[$submenu->id]= $a;
              }
          }
      }
      return $grandmenu;
    }

    // public function services(){
    //   $services = Homesectionsetting::where('status',1)->get();
      
    //   return $services;
    // }

     public function services(){
      $services = Service::where('is_active',1)->get();
      
      return $services;
    }

    public function checkChild($id){
      
        foreach ($this->submenu() as $key => $smenu) {
            foreach ($smenu as $key => $submenu) {
              if ($id == $submenu->parent_id) {
                return 1;
              }else{
                return 0;
              }
            }
        }
      
    }
    public function checkgrandChild($id){
      
        foreach ($this->grandmenu() as $key => $gmenu) {
            foreach ($gmenu as $key => $grandmenu) {
              if ($id == $grandmenu->parent_id) {
                return 1;
              }else{
                return 0;
              }
            }
        }
      
    }

    public function getParentId($id)
    {
        
        $a = Menu::select()->where('parent_id',$id)->get();
        
        if($a->first()) 
        return true;
        else 
        return false;        
    }










}