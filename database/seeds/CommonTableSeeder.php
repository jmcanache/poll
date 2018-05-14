<?php

use Illuminate\Database\Seeder;
use App\Common;
use App\Custom_poll;

class CommonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$custom_poll_id = Custom_poll::where('name', 'second')->first(); 
        Common::create([
            'custom_poll_id' => $custom_poll_id->id,
            'title_table'    => 'Qualification',
            'th_1'			 =>	'Indicator',
            'th_2'			 =>	'Points',
            'tf'			 => 'Summary',
            'stf_1'			 => 'Indicator points',
            'stf_2'			 => 'Additional points',
            'tp'			 => 'Total points',
            'title_answer'	 => 'Should this indicator be included in the study?',
            'title_textbox'	 => 'If not, tell us why?',
        ]);
    }
}
