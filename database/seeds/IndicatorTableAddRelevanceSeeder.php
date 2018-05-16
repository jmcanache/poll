<?php

use Illuminate\Database\Seeder;
use App\Indicator;

class IndicatorTableAddRelevanceSeeder extends Seeder
{
    /**
     * Run the database seeds,
     *
     * @return void
     */
    public function run()
    {
        $indi = Indicator::where('name', '01 - Consolidation in time')->update(['relevance' => "7,2"]);
    	$indi = Indicator::where('name', '02 - Relation with other universities')->update(['relevance' => "6,0"]);
    	$indi = Indicator::where('name', '03 - Study plan: Length vs Benefit')->update(['relevance' => "7,2"]);
    	$indi = Indicator::where('name', '04 - Study plan: Teaching system')->update(['relevance' => "10,8"]);
    	$indi = Indicator::where('name', '05 - Job opportunities and networking')->update(['relevance' => "6,0"]);
    	$indi = Indicator::where('name', '06 - Faculty Internationality')->update(['relevance' => "7,2"]);
    	$indi = Indicator::where('name', '07 - Faculty Competence')->update(['relevance' => "10,8"]);
    	$indi = Indicator::where('name', '08 - Alumni internationality')->update(['relevance' => "6,0"]);
    	$indi = Indicator::where('name', '09 - Alumni competence')->update(['relevance' => "10,8"]);
    	$indi = Indicator::where('name', '10 - Publications')->update(['relevance' => "7,2"]);
    	$indi = Indicator::where('name', '11 - Facilities')->update(['relevance' => "7,2"]);
    	$indi = Indicator::where('name', '12 - Surveys')->update(['relevance' => "8,4"]);
    	$indi = Indicator::where('name', '13 - Extra points')->update(['relevance' => "4,8"]);
    }
}
