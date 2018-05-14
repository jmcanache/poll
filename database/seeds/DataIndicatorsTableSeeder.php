<?php

use Illuminate\Database\Seeder;
use App\Indicator;
use App\Data_indicator;

class DataIndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$indicators_id = Indicator::orderBy('position', 'asc')->get();
        $texts = [	'Dear Expert, welcome to BAM Form for methodology validation. </br></br>
					BAM in an initiative that looks for a qualitative comparison between related architecture
					postgraduate programs offered by the best ranked universities in the world. It is intended to
					establish basic criteria to effectively and objectively compare study plans that, despite being
					different, are focused on the academic development of better architects.</br></br>
					BAM’s ranking goal is to help architects and architecture students to get to know the best
					international postgraduate programs available, thanks to a transparent comparative method.</br></br>
					<strong>All the information is confidential treated and it will be only used for the BAM Ranking 2018
					purposes.</strong>',

					'BAM’s methodology derives from the adjustment of different indicators used to compare the
					world’s leading colleges, architecture schools and master degrees programs. The aim is to be
					able to objectively measure them, and effectively compare them, even if they are
					asymmetrical in length and content.</br></br>
					In this form, you are asked to give your opinion about the methodology that the BAM Ranking
					Team is using to evaluate Postgraduate programs in architecture. This methodology consists
					on a list of indicators focused on quality and internationality of the faculty, alumni and study
					program. Furthermore, other essential variables for a program to be considered as prestigious
					are taken into account.</br></br>
					Each indicator has a related evaluation-point, and the sum of all the indicators provide the
					final Score of the program in a 1-100 scale.</br></br>
					<strong>Please, read the indicator and select one of the options offered. You are
					invited to make suggestions about indicators and scores.</strong>',

					'The age of a master shows its success through the continuous demand, with applicants in each
					edition. Its continuity through time means a teaching program is stable and generates
					confidence in newcomers. It also proves itself relevant for the professionals who participated
					in the past.</br></br>
					To achieve points in this section, each study plan must have a least 6 editions of success under
					a similar name. Study plans with more than 10 editions obtain additional point in this section.',

					'It will be positively valued that a postgraduate program is directly related to other universities
					at international level due to the continuous communication it implies and the possibility to
					generate educational agreements that benefit both students and alumni.</br></br>
					To obtain this point, it is necessary for the program to have relation with at least one foreign
					university in terms of exchange, lectures, etc. Double diploma degrees obtain additional point,
					for letting student obtain a diploma in different countries, maximizing the chances of
					professional success, career, and research development.',

					'The relation between cost and length of the master program is a relevant indicator for find out
					its acceptance and affordability. Many candidates have limited resources to invest in their
					further education. Therefore, prices must have and effective relation between the master
					program and its length in time, to be regarded and recognized as an attractive opportunity.
					Quite often, international masters with an excessive cost prevent many high qualified
					professionals from studying in reliable international institutions.</br></br>
					For scoring here, the postgraduate program must show that its assigned relation between cost
					and duration (measured in study ECTS-European Credit Transfer System) has an acceptable
					relation with its cost. Maximum cost of an academic hour must be between 25 and 35 Euros an
					hour. Additional points are achieved if the program has available Scholarships for new
					candidates.',

					'Optimum quality means generating the best benefits available to the whole alumni corps once
					the course has finished, promoting a successful development of their professional career. This
					will be tested through the balanced relation between theory and practice, aiming to cover the
					different areas of knowledge in an integral, substantial and professional way.</br></br>
					To fulfill this requirement, the program must prove having a balanced educational system
					between theoretical lessons, practice and workshops. The program must also be holistic in its
					lessons. Additional points are achieved if the program offers open lectures for the students not
					necessarily inscribed in the course. An additional point is achieved if the program offers
					distance lectures for foreign students.',

					'It is positively valued that the postgraduate program supports the career development of the
					participants in terms of job opportunities and networking between professors, former
					students and other professionals in the field.</br></br>
					To score here, the program must include different strategies to increase the professional
					possibilities of the participants in the future.',

					'International professors contribute to offer a wide and multicultural educative experience that
					promotes the professional enrichment of the students.</br></br>
					For scoring these points, the program will have at least 60% of its professors from no less than
					six different countries. Additionally, extra points are given in case the professors of the same
					edition are from three different geographical areas.',

					'The academic and professional competence of the professors is highly valued to ensure that
					imparted lectures will maintain a high quality in terms of teaching. This will be measured by
					the achieved PhD studies and by the number of professors actively involved in relevant
					practices related to the profession.</br></br>
					To fulfill this requirement, the study plan will need to prove that at least 50% of its professors
					have a PhD and that at least 60% of them work at a relevant architecture office in their
					country.',

					'International participants also contribute to create a wide and multicultural educative
					experience that promotes the professional enrichment of the students.</br></br>
					To score these points, the study plan must register at least 60% of its alumni from no less than
					six different countries. Additionally, extra points are given in case alumni of the same edition
					came from three different geographical areas.',

					'It is valued that accepted students are competent in their professional areas, and relevant in
					the countries where they work. Students competence is showed through prizes, relevant
					professional background, publications, entrepreneurship, or additional postgraduate studies.</br></br>
					More than half the students of the plan must gather those characteristics to obtain points in
					this section.',

					'It is highly valued that the program made relevant publications related to the profession in
					research, practical work or any other. The amount of publications shows and demonstrates the
					performance of the work that the participants have made as part of the program. Also, it is
					taken in consideration the quantity of publications developed by the regular professors of the
					program because it can determine the prestigious and relevance of the faculty and the quality
					of teaching.</br></br>
					To achieve points in this section, the program must demonstrate that they are producing at
					least one publication per year. It is asked to give a list of the publications which the program
					has been involved.</br></br>
					In addition, the program must give a list of regular professors indicating the publications they
					have developed. To obtain these points, at least 30% of the faculty must be involved as author
					or coauthor of relevant national or international publications.',

					'It is specially taken into consideration for the development of the program to have a dedicated
					and suitable space in all its stages. It is also considered that participants have access to
					different tools and materials needed to can successfully complete the required tasks.</br></br>
					For a good score here, the study plan must offer the following spaces: continuous workshop
					space, open public space, suitable lighting in work spaces, dedicated spaces for construction of
					models, personal spaces for each of the students and general facilities. Additional point is
					granted if materials and tools free of charge for the students are provided by the program.',

					'It is specially relevant to consider the level of satisfaction level of the former students of the
					program and their regular faculty. The opinion of all these people determines the value of the
					program in terms of results and educational experience. Two different surveys are created for
					former students and professors in order to know about their experience as part of the
					program.</br></br>
					To achieve points in this section, the program must send at least 20% completed surveys by
					regular faculty. In addition, it is mandatory to send a minimum of 30% of the surveys for
					former students.',

					'BAM Ranking takes the QS University Ranking by Subject 2018 as a reference for the selection
					of programs to be studied. Due to the relevance of this Ranking for the BAM Project, some
					additional points are achieved for the programs which are presented by the first 10th
					universities of architecture ranked of the QS Ranking by Subject 2018.</br></br>
					In addition, the study plan will obtain an extra point in case of implementing innovative
					teaching methods. This includes new technologies, tools, processes and activities that promote
					innovation and boldness in the master’s degree.',

					'BAM Ranking aims to use these 13 indicators to evaluate the different postgraduate
					architecture programs. Each indicator have a particular score, and the sum of all them will
					determine the final score of the program.',

					'If you consider we are missing indicators for the methodology to evaluate, please
					indicate it in the following field:',

					'Thank you very much for your collaboration for the BAM Ranking.</br></br>
					We will check the information you have provided and the results of the study will be
					updated at: <h3><strong>www.bestarchitecturemasters.com</strong></h3>'
        ];

        foreach ($texts as $index => $text) {
        	$indi_id = $indicators_id[$index]->id;
        	Data_indicator::create([
	        	'indicator_id' => $indi_id,
	            'main_text' => $text,
	        ]);
        }
    }
}
