<?php

use Illuminate\Database\Seeder;
use App\Indicator;

class IndicatorTablePointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
    	$indi = Indicator::where('name', '01 - Consolidation in time')->update(['indi_points' => 3, 'add_points' => 3]);
    	$indi = Indicator::where('name', '02 - Relation with other universities')->update(['indi_points' => 3, 'add_points' => 2]);
    	$indi = Indicator::where('name', '03 - Study plan: Length vs Benefit')->update(['indi_points' => 4, 'add_points' => 2]);
    	$indi = Indicator::where('name', '04 - Study plan: Teaching system')->update(['indi_points' => 6, 'add_points' => 3]);
    	$indi = Indicator::where('name', '05 - Job opportunities and networking')->update(['indi_points' => 5, 'add_points' => 0]);
    	$indi = Indicator::where('name', '06 - Faculty Internationality')->update(['indi_points' => 5, 'add_points' => 1]);
    	$indi = Indicator::where('name', '07 - Faculty Competence')->update(['indi_points' => 9, 'add_points' => 0]);
    	$indi = Indicator::where('name', '08 - Alumni internationality')->update(['indi_points' => 4, 'add_points' => 1]);
    	$indi = Indicator::where('name', '09 - Alumni competence')->update(['indi_points' => 9, 'add_points' => 0]);
    	$indi = Indicator::where('name', '10 - Publications')->update(['indi_points' => 6, 'add_points' => 0]);
    	$indi = Indicator::where('name', '11 - Facilities')->update(['indi_points' => 5, 'add_points' => 1]);
    	$indi = Indicator::where('name', '12 - Surveys')->update(['indi_points' => 7, 'add_points' => 0]);
    	$indi = Indicator::where('name', '13 - Extra points')->update(['indi_points' => 4, 'add_points' => 0]);
    }
}