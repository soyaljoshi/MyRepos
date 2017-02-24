<?php

use App\Models\Menu;

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Menu::truncate();

        DB::table('menus')->insert([
            [
               
                'name'            => 'Home',
                'slug'            => 'home',
                'parent_id'       => '0',
                'order'			  =>'1',
                'url'			  =>'/'
            ],
            [
               
                'name'            => 'Photo Gallery',
                'slug'            => 'photogallery',
                'parent_id'       => '0',
                'order'			  =>'2',
                'url'			  =>'/photogallery'
            ], 
            [
               
                'name'            => 'Contact Us',
                'slug'            => 'contact-us',
                'parent_id'       => '0',
                'order'			  =>'3',
                'url'			  =>'/contact-us'
            ],
             [
               
                'name'            => 'About Us',
                'slug'            => 'about',
                'parent_id'       => '0',
                'order'			  =>'4',
                'url'			  =>'/about'
            ],
            [
               
                'name'            => 'Archieved',
                'slug'            => 'archieved',
                'parent_id'       => '0',
                'order'			  =>'5',
                'url'			  =>'/archieved'
            ],
            [
               
                'name'            => 'Publication',
                'slug'            => 'publication',
                'parent_id'       => '0',
                'order'			  =>'6',
                'url'			  =>'/publication'
            ],
             [
               
                'name'            => 'List of Staff',
                'slug'            => 'staff-list',
                'parent_id'       => '4',
                'order'			  =>'7',
                'url'			  =>'/stafflist'
            ],

        ]);
    }
}
