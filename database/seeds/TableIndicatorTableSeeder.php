<?php

use Illuminate\Database\Seeder;
use App\Table_indicator;
use App\Indicator;

class TableIndicatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = [	'Less than 6 editions' => 0,
				'More than 6 editions and less than 10' => 3,
				'More than 10 editions (AP)' => 3
		];

		$t2 = [	'Non-related with other universities' => 0,
				'Participants exchange and lectures in other universities' => 2,
				'Research exchange with other universities' => 1,
				'Double diploma (AP)' => 2
		];

		$t3 = [	'Cost academic hour: 0-25 Euro' => 2,
				'Cost academic hour: 25-35 Euro' => 2,
				'Cost academic hour: more than 35 Euro' => 0,
				'Available scholarships (AP)' => 2
		];

		$t4 = [	'Theory vs Practice rate: Theoretical' => 0,
				'Theory vs Practice rate: Balanced' => 3,
				'Theory vs Practice rate: Practical' => 0,
				'Specialization rate: Holistic' => 0,
				'Specialization rate: Balanced' => 3,
				'Specialization rate: Highly Specific' => 0,
				'Distance learning lectures (AP)' => 1,
				'Open lectures (AP)' => 2,
		];

		$t5 = [	'Internships in companies as part of the credits of the program' => 1,
				'Job bank for participants. Career development center' => 3,
				'Promotion of regular exchange between former participants' => 1
		];

		$t6 = [	'International faculty rate 0-60%' => 0,
				'International faculty rate 60-90%' => 3,
				'International faculty rate 90-100%' => 2,
				'Faculty from 3 different geographical areas (AP)' => 1
		];

		$t7 = [	'Build work relevance of professors: 0-60% of faculty' => 0,
				'Build work relevance of professors: 60-90% of faculty' => 2,
				'Build work relevance of professors: 90-100% of faculty' => 2,
				'PhD faculty rate 0-50%' => 0,
				'PhD faculty rate 50-80%' => 3,
				'PhD faculty rate 80-100%' => 2
		];

		$t8 = [	'Participants internationality rate 0-60%' => 0,
				'Participants internationality rate 60-90%' => 3,
				'Participants internationality rate 90-100%' => 1,
				'Participants from 3 different geographical areas (AP)' => 1
		];

		$t9 = [	'Build work relevance of current participants: 0-50% of students' => 0,
				'Build work relevance of current participants: 0-80% of students' => 2,
				'Build work relevance of current participants: 80-100% of students' => 1,
				'Proportion of students with other postgraduate studies 0-30%' => 0,
				'Proportion of students with other postgraduate studies 30-70%' => 1,
				'Proportion of students with other postgraduate studies 70-100%' => 1,
				'Alumni success rate 0-50%' => 0,
				'Alumni success rate 50-80%' => 3,
				'Alumni success rate 80-100%' => 1
		];

		$t10 = ['Publications developed by the program: less than 1 per year' => 0,
				'Publications developed by the program: 1 to 3 per year' => 2,
				'Publications developed by the program: more than 3 per year' => 1,
				'Proportion of professors with relevant publications: 0-30%' => 0,
				'Proportion of professors with relevant publications: 30-70%' => 2,
				'Proportion of professors with relevant publications: 70-100%' => 1
		];

		$t11 = ['Exclusive space' => 1,
				'Proper natural lighting of the space' => 1,
				'Outside space' => 1,
				'Personal space for participants' => 1,
				'Program-related library' => 1,
				'Free access to facilities (printer, plotter, laser cutter, etc.) (AP)' => 1,
		];

		$t12 = ['Faculty Surveys. At least 20% of faculty' => 4,
				'Alumni Surveys. At least 30% of alumni of the previous edition' => 3
		];

		$t13 = ['Holder university ranked in the first #10 of the QS ranking 2018' => 2,
				'Demonstrated innovative teaching processes' => 2
		];

		$indi = [$t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9, $t10, $t11, $t12, $t13];
		$indicators_id = Indicator::where('state_poll', 1)->orderBy('position', 'asc')->get();

		foreach ($indicators_id as $index => $row) {
			$indi_id = $row->id;
			foreach ($indi[$index] as $description => $point) {
				Table_indicator::create([
					'indicator_id' => $indi_id,
		        	'description' => $description,
		            'point' => $point,
		        ]);
			}
		}
    }
}
