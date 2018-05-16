<?php

use Illuminate\Database\Seeder;
use App\Indicator;
use App\Custom_poll;

class IndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$custom_poll_id = Custom_poll::where('name', 'second')->first();
		$names_indicator = [3  => '01 - Consolidation in time',
					    	4  => '02 - Relation with other universities',
					    	5  => '03 - Study plan: Length vs Benefit',
					    	6  => '04 - Study plan: Teaching system',
					    	7  => '05 - Job opportunities and networking',
					    	8  => '06 - Faculty Internationality',
					    	9  => '07 - Faculty Competence',
					    	10 => '08 - Alumni internationality',
					    	11 => '09 - Alumni competence',
					    	12 => '10 - Publications',
					    	13 => '11 - Facilities',
					    	14 => '12 - Surveys',
					    	15 => '13 - Extra points',
						];

		$names_title = [1  => 'METHODOLOGY VALIDATION',
						2  => 'METHODOLOGY VALIDATION',
					  	16 => 'Summary',
					  	17 => 'SUGGESTED INDICATORS FOR THE STUDY',
					  	18 => 'YOU HAVE FINISHED THE METHODOLOGY VALIDATION FORM!'
					];

		foreach ($names_indicator as $key => $name) {
			Indicator::create([
	        	'custom_poll_id' => $custom_poll_id->id,
	            'name' => $name,
	            'state_poll' => 1,
	            'position' => $key,
	        ]);
		}

		foreach ($names_title as $key => $name) {
			Indicator::create([
	        	'custom_poll_id' => $custom_poll_id->id,
	            'name' => $name,
	            'state_poll' => 0,
	            'position' => $key,
	        ]);
		}
    }
}
