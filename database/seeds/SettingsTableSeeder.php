<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

/*
|--------------------------------------------------------------------------
| Initial Settings Seed Data
|--------------------------------------------------------------------------
|
| Here you may set the page details for various application
| pages. Don't worry, you can always edit these
| details within the application.
|
*/

class SettingsTableSeeder extends Seeder
{

    /**
     * Run the Admin model database seed.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();

        DB::table('settings')->insert([
            [
                'slug'  => 'name',
                'name'  => 'Name',
                'value' => 'Nepal Public Health Laboratory'
            ],
            [
                'slug'  => 'address',
                'name'  => 'Address',
                'value' => 'Teku, kathmandu , Nepal',
            ],
            [
                'slug'  => 'phone',
                'name'  => 'Phone',
                'value' => '+977 9801453020',
            ],
            [
                'slug'  => 'fax',
                'name'  => 'Fax',
                'value' => '+977 1 000000',
            ],
            [
                'slug'  => 'email',
                'name'  => 'Email',
                'value' => 'info@nphl.gov.np'
            ],
            [
                'slug'  => 'gpo',
                'name'  => 'GPO',
                'value' => '000‚ EPC: 977'
            ],
            [
                'slug'  => 'facebook',
                'name'  => 'Facebook',
                'value' => 'https://www.facebook.com/nphl'
            ],
            [
                'slug'  => 'twitter',
                'name'  => 'Twitter',
                'value' => 'https://www.twitter.com'
            ],
            [
                'slug'  => 'google-plus',
                'name'  => 'Google Plus',
                'value' => 'https://www.google.com'
            ],
            [
                'slug'  => 'pop-up',
                'name'  => 'Pop Up',
                'value' => 'images/Nepal.png'
            ],
             [
                'slug'  => 'longitude',
                'name'  => 'Longitude',
                'value' => '85.342',
            ],
            [
                'slug'  => 'latitude',
                'name'  => 'Latitude',
                'value' => '27.6915',
            ],
            [
                'slug'  => 'footer-1',
                'name'  => 'Footer 1 ',
                'value' => ' <h3 style="color:white">Contact Us</h3>
                                <p style="color:white;margin-bottom:1px;font-weight:420"><b>Government of Nepal</b></p>
                                <p style="color:white;margin-bottom:1px;margin-top:0;font-weight:420">Ministry of Health & Population</p>
                                <p style="color:white;margin-bottom:1px;margin-top:0;font-weight:420">Department of Health Services</p>
                                <p style="color:white"><b>National Public Health Laboratory</b></p>
                                <div class="widget_text">
                                    <ul>
                                        <li style="color:white"> Teku, Kathmandu, Nepal </li>
                                        <li style="color:white"> +977-1-4252421 </li>
                                        <li style="color:white"> nphl@wlink.com.np <br> </li>
                                        
                                    </ul>
                                </div>',
            ],
            [
                'slug'  => 'footer-2',
                'name'  => 'Footer 2',
                'value' => '<ul>
                                        <li><p style="color:white;margin-bottom:0;font-weight:420">Sample Collection time: 9 AM - 1:30 PM (Friday: 9 AM - 12 PM)</p></li>
                                        <li><p style="color:white;margin-bottm:0;font-weight:420">Report Distribution time: 10 AM- 4 PM (Friday: 10 AM - 2 PM)</p></li>
                                        <li><p style="color:white;margin-bottom:1px;font-weight:420;margin-top:0"><b>The office will be closed on public holidays.</b></p></li>
                                        <li><p style="color:white;margin-bottom:0;font-weight:420;margin-top:1px">Incharge:</li>
                                       <li><p style="color:white;margin-top:0"><b>Dr. Runa Jha</b></p></li>
                                        
                                    </ul>',
            ]
        ]);
    }
}
