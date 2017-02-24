<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        DB::table('tags')->insert([
        
            [
                'tag'              => 'news',
                'title'            => 'News',
                'icon'             => '&#xE0E0;',
                'meta_description' => 'NPHL news',
            ],
            [
                'tag'              => 'events',
                'title'            => 'Notice & Events',
                'icon'             => '&#xE7F7;',
                'meta_description' => 'NPHL events',
            ],
            [
                'tag'              => 'publication',
                'title'            => 'Publication',
                'icon'             => '&#xE060;',
                'meta_description' => 'NPHL Publication',
            ],
            [
                'tag'              => 'activities',
                'title'            => 'Activities',
                'icon'             => '&#xE0E0;',
                'meta_description' => 'NPHL Activites',
            ],
            [
                'tag'              => 'comingSoon',
                'title'            => 'Coming Soon',
                'icon'             => '&#xE0E0;',
                'meta_description' => 'NPHL Coming Soon',
            ]

        ]);
    }
}
