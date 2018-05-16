<?php

use Illuminate\Database\Seeder;
use App\Table_indicator;

class TableIndicatorsTableAddPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Table_indicator::where('description', 'Less than 6 editions')->update(['position' => 1]);
    	Table_indicator::where('description', 'More than 6 editions and less than 10')->update(['position' => 2]);
    	Table_indicator::where('description', 'More than 10 editions (AP)')->update(['position' => 3]);

    	Table_indicator::where('description', 'Non-related with other universities')->update(['position' => 1]);
    	Table_indicator::where('description', 'Participants exchange and lectures in other universities')->update(['position' => 2]);
    	Table_indicator::where('description', 'Research exchange with other universities')->update(['position' => 3]);
    	Table_indicator::where('description', 'Double diploma (AP)')->update(['position' => 4]);

    	Table_indicator::where('description', 'Cost academic hour: 0-25 Euro')->update(['position' => 1]);
    	Table_indicator::where('description', 'Cost academic hour: 25-35 Euro')->update(['position' => 2]);
    	Table_indicator::where('description', 'Cost academic hour: more than 35 Euro')->update(['position' => 3]);
    	Table_indicator::where('description', 'Available scholarships (AP)')->update(['position' => 4]);

    	Table_indicator::where('description', 'Theory vs Practice rate: Theoretical')->update(['position' => 1]);
    	Table_indicator::where('description', 'Theory vs Practice rate: Balanced')->update(['position' => 2]);
    	Table_indicator::where('description', 'Theory vs Practice rate: Practical')->update(['position' => 3]);
    	Table_indicator::where('description', 'Specialization rate: Holistic')->update(['position' => 4]);
    	Table_indicator::where('description', 'Specialization rate: Balanced')->update(['position' => 5]);
    	Table_indicator::where('description', 'Specialization rate: Highly Specific')->update(['position' => 6]);
    	Table_indicator::where('description', 'Distance learning lectures (AP)')->update(['position' => 7]);
    	Table_indicator::where('description', 'Open lectures (AP)')->update(['position' => 8]);

    	Table_indicator::where('description', 'Internships in companies as part of the credits of the program')->update(['position' => 1]);
    	Table_indicator::where('description', 'Job bank for participants. Career development center')->update(['position' => 2]);
    	Table_indicator::where('description', 'Promotion of regular exchange between former participants')->update(['position' => 3]);

    	Table_indicator::where('description', 'International faculty rate 0-60%')->update(['position' => 1]);
    	Table_indicator::where('description', 'International faculty rate 60-90%')->update(['position' => 2]);
    	Table_indicator::where('description', 'International faculty rate 90-100%')->update(['position' => 3]);
    	Table_indicator::where('description', 'Faculty from 3 different geographical areas (AP)')->update(['position' => 4]);

    	Table_indicator::where('description', 'Build work relevance of professors: 0-60% of faculty')->update(['position' => 1]);
    	Table_indicator::where('description', 'Build work relevance of professors: 60-90% of faculty')->update(['position' => 2]);
    	Table_indicator::where('description', 'Build work relevance of professors: 90-100% of faculty')->update(['position' => 3]);
    	Table_indicator::where('description', 'PhD faculty rate 0-50%')->update(['position' => 4]);
    	Table_indicator::where('description', 'PhD faculty rate 50-80%')->update(['position' => 5]);
    	Table_indicator::where('description', 'PhD faculty rate 80-100%')->update(['position' => 6]);

    	Table_indicator::where('description', 'Participants internationality rate 0-60%')->update(['position' => 1]);
    	Table_indicator::where('description', 'Participants internationality rate 60-90%')->update(['position' => 2]);
    	Table_indicator::where('description', 'Participants internationality rate 90-100%')->update(['position' => 3]);
    	Table_indicator::where('description', 'Participants from 3 different geographical areas (AP)')->update(['position' => 4]);

    	Table_indicator::where('description', 'Build work relevance of current participants: 0-50% of students')->update(['position' => 1]);
    	Table_indicator::where('description', 'Build work relevance of current participants: 0-80% of students')->update(['position' => 2]);
    	Table_indicator::where('description', 'Build work relevance of current participants: 80-100% of students')->update(['position' => 3]);
    	Table_indicator::where('description', 'Proportion of students with other postgraduate studies 0-30%')->update(['position' => 4]);
    	Table_indicator::where('description', 'Proportion of students with other postgraduate studies 30-70%')->update(['position' => 5]);
    	Table_indicator::where('description', 'Proportion of students with other postgraduate studies 70-100%')->update(['position' => 6]);
    	Table_indicator::where('description', 'Alumni success rate 0-50%')->update(['position' => 7]);
    	Table_indicator::where('description', 'Alumni success rate 50-80%')->update(['position' => 8]);
    	Table_indicator::where('description', 'Alumni success rate 80-100%')->update(['position' => 9]);

    	Table_indicator::where('description', 'Publications developed by the program: less than 1 per year')->update(['position' => 1]);
    	Table_indicator::where('description', 'Publications developed by the program: 1 to 3 per year')->update(['position' => 2]);
    	Table_indicator::where('description', 'Publications developed by the program: more than 3 per year')->update(['position' => 3]);
    	Table_indicator::where('description', 'Proportion of professors with relevant publications: 0-30%')->update(['position' => 4]);
    	Table_indicator::where('description', 'Proportion of professors with relevant publications: 30-70%')->update(['position' => 5]);
    	Table_indicator::where('description', 'Proportion of professors with relevant publications: 70-100%')->update(['position' => 6]);

    	Table_indicator::where('description', 'Exclusive space')->update(['position' => 1]);
    	Table_indicator::where('description', 'Proper natural lighting of the space')->update(['position' => 2]);
    	Table_indicator::where('description', 'Outside space')->update(['position' => 3]);
    	Table_indicator::where('description', 'Personal space for participants')->update(['position' => 4]);
    	Table_indicator::where('description', 'Program-related library')->update(['position' => 5]);
    	Table_indicator::where('description', 'Free access to facilities (printer, plotter, laser cutter, etc.) (AP)')->update(['position' => 6]);

    	Table_indicator::where('description', 'Faculty Surveys. At least 20% of faculty')->update(['position' => 1]);
    	Table_indicator::where('description', 'Alumni Surveys. At least 30% of alumni of the previous edition')->update(['position' => 2]);

    	Table_indicator::where('description', 'Holder university ranked in the first #10 of the QS ranking 2018')->update(['position' => 1]);
    	Table_indicator::where('description', 'Demonstrated innovative teaching processes')->update(['position' => 2]);
    }
}
