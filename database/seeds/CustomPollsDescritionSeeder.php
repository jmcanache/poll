<?php

use Illuminate\Database\Seeder;
use App\Custom_poll;

class CustomPollsDescritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$add_description = Custom_poll::where('name', 'second')->first();

		$add_description->description = '<h2>BAM FORM #2</h2>
										<h5>Methodology validation</h5>
										<h4>To Experts Committee</h4>';

		$add_description->save();
	}
}
