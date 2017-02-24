<?php

use Illuminate\Database\Seeder;
use App\Models\Homesectionsetting;

class HomeSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //

        Homesectionsetting::truncate();

        DB::table('homesectionsettings')->insert([
            [
               
                'title'          => 'Message From Director',
                'subtitle'       => 'message from director',
                'description'    => '<div class="col-md-3"><br /> <img style="width: 139px; height: 150px;" src="http://www.nphl.gov.np/userfiles/images/dr_geet_shakya.jpg" alt="" />
									<div class="row">
									<div class="col-md-12" style="margin-left: 3px;">
									<p style="font-size: 120%; font-weight: bold; margin-bottom: 0;">Dr. Geeta Shakya</p>
									<p style="font-size: 105%; font-weight: 400;">Director, NPHL</p>
									</div>
									</div>
									</div>
									<div class="col-md-9" style="margin-top: 15px;">
									<p style="font-size: 115%; font-weight: 500; text-align: justify;">Laboratory services have a key role in the health care of an individual as well as the population, which is reflected in the expectations of the sick and their treating physicians.Accuracy of results obtainable through advanced technology and expertise through super-specialization only can assure confidence...</p>
									<p style="font-size: 115%; font-weight: 500; text-align: justify;"><a class="care_bt" title="Read More" href="http://http//:google.com">Read More</a></p>
									<p style="font-size: 115%; font-weight: 500; text-align: justify;">&nbsp;</p>
									</div>',
                'status'		 =>'1'
               
            ],
             [
               
                'title'          => 'Opening Hours',
                'subtitle'       => 'opening hours',
                'description'    => '<p class="colorWhite" style="margin: 0; padding: 0; font-size: 1.05em;">Sample Collection time: 9 AM - 1:30 PM (Friday: 9 AM - 12 PM)</p>
<p class="colorWhite" style="margin-bottom: 3px; padding: 0; font-size: 1.05em;">Report Distribution time: 10 AM- 4 PM (Friday: 10 AM - 2 PM)</p>
<p class="colorWhite" style="font-weight: 500; font-size: 1.3em;">The office will be closed on public holidays.</p>',
                'status'		 =>'1'
               
            ],
        ]);
    }
}
