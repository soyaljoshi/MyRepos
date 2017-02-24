<?php

use App\Models\Slider;

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Slider::truncate();

        DB::table('sliders')->insert([
            [
             
                'title'            => 'Slider 1 ',
                'slug'             => 'Slider1',
                'caption'		   =>  'Caption For Slider 1 ',
                'url'			   => '/slider1',
                'subtitle'		   => 'Sub title for slider 1',
                'status'	       =>	'1',
                'animation'        => '',
                'caption_position' => ''
            ],
            [
                'title'            => 'Slider 2 ',
                'slug'             => 'Slider2',
                'caption'		   =>  'Caption For Slider 1 ',
                'url'			   => '/slider1',
                'subtitle'		   => 'Sub title for slider 1',
                'status'	       =>	'1',
                'animation'        => '',
                'caption_position' => ''
            ],
            [
                'title'            => 'Slider 3 ',
                'slug'             => 'slider3',
                'caption'		   =>  'Caption For Slider 1 ',
                'url'			   => '/slider1',
                'subtitle'		   => 'Sub title for slider 1',
                'status'	       =>	'1',
                'animation'        => '',
                'caption_position' => ''
            ],
            [
                'title'            => 'Slider 4',
                'slug'             => 'slider4',
                'caption'		   =>  'Caption For Slider 1 ',
                'url'			   => '/slider1',
                'subtitle'		   => 'Sub title for slider 1',
                'status'	       =>	'1',
                'animation'        => '',
                'caption_position' => ''
            ]
            
        ]);
    }
}
