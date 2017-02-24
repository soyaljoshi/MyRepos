<?php
use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Division::truncate();

        DB::table('divisions')->insert([
        
            [
                'name'            => 'Directors',
                'slug'            =>  'directors',
                'hierarchy'             => 0,
            ],
            [
                'name'            => 'Our Consultants',
                'slug'            =>  'Consultants',
                'hierarchy'             => 1,
            ],
            [
                'name'            => 'Technical Team',
                'slug'            =>  'technical',
                'hierarchy'             => 2,
            ],
            [
                'name'            => 'Administration',
                'slug'            =>  'administration',
                'hierarchy'             => 3,
            ]
        ]);
    }
}
