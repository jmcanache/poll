<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Custom_poll;
use App\Indicator;
use App\Data_indicator;
use App\Common;
use App\Table_indicator;
use Mail;
use Log;

class Poll2Controller extends Controller
{
    public function index(){
    	$poll = Custom_poll::getPollByName('second');
    	$first_indicator = $poll->indicators->where('position', 1)->first();

    	$data_indicator = $first_indicator->data_indicators->first();

    	return view('polls/main_poll_2', ['current_poll' => 'second', 'poll_description' => $poll->description, 'indicator_title' => $first_indicator->name, 'indicator_text' => $data_indicator->main_text, 'edit_active' => false]);
    }

    public function index_edit(){
    	$poll = Custom_poll::getPollByName('second');
    	$first_indicator = $poll->indicators->where('position', 1)->first();

    	$data_indicator = $first_indicator->data_indicators->first();

    	return view('polls/main_poll_2', ['current_poll' => 'second', 'poll_description' => $poll->description, 'indicator_title' => $first_indicator->name, 'indicator_text' => $data_indicator->main_text, 'edit_active' => true]);
    }

    public function getNextPageInfo($next_position, $current_poll){
    	$poll = Custom_poll::getPollByName($current_poll);
    	$indicator = $poll->indicators->where('position', (int)$next_position)->first();
    	$data_indicator = $indicator->data_indicators->first();

    	$common_data = [];
    	$table_data = [];
    	$all_indicators = [];

    	if($indicator->state_poll == 1){
    		$common_data = $poll->common;
    		$table_data = $indicator->table_indicators;
    	}

    	if($next_position == 16){
    		$all_indicators = Indicator::where('state_poll', 1)->orderBy('position', 'asc')->get();
    	}

    	return response()->json(array('current_poll' => $current_poll, 'indicator' => $indicator, 'data_indicator' => $data_indicator, 'common' => $common_data, 'table_data' => $table_data, 'all_indicators' => $all_indicators ));
    }

    public function send_mail(Request $request){
    	$db_indicators = Indicator::where('state_poll', 1)->pluck('name', 'position');
        try{
	        Mail::send('emails.email_poll2', ['answers' => json_decode($request['answers']), 'explains' => json_decode($request['explains']), 'indicators' => json_decode($request['indicators']), 'db_indicators' => $db_indicators], function ($m) {
	            $m->from('bam-noreply@bestarchitecturemasters.com', 'BAM');
	            $m->to('canache39@gmail.com', 'BAM')->subject('BAM FORM #2');
	        });
	    }catch(\Exception $e){
		    return response()->json(array('send' => 0));
		}
		return response()->json(array('send' => 1));
    }

    public function edit_data(Request $request){
    	try{
	    	$custom_poll = Custom_poll::where(['name' => $request['custom_polls']['name']])->first();
	    	$indicator = Indicator::where(['position' => $request['indicator']['position']])->first();
	    	$data_indicator = Data_indicator::where(['indicator_id' => $indicator->id])->first();
	    	$common = Common::where(['custom_poll_id' => $custom_poll->id])->first();
	    	Table_indicator::where(['indicator_id' => $indicator->id])->delete();

	    	if($request['indicator']['position'] == 1){
	    		$custom_poll->description = trim($request['custom_polls']['description']);
	    		$custom_poll->save();
	    	}

	    	if(array_has($request['indicator'], 'indicator_title')){
	    		$indicator->name = trim($request['indicator']['indicator_title']);
	    		$indicator->save();
	    	}

	    	if(array_has($request['data_indicator'], 'main_text')){
	    		$data_indicator->main_text = trim($request['data_indicator']['main_text']);
	    		$data_indicator->save();
	    	}

	    	if(array_has($request, 'common')){
	    		$common->title_table =  trim($request['common']['title_table']);
	    		$common->th_1 =  trim($request['common']['th_1']);
	    		$common->th_2 =  trim($request['common']['th_2']);
	    		$common->tf =  trim($request['common']['tf']);
	    		$common->stf_1 =  trim($request['common']['stf_1']);
	    		$common->stf_2 =  trim($request['common']['stf_2']);
	    		$common->tp =  trim($request['common']['tp']);
	    		$common->title_answer =  trim($request['common']['title_answer']);
	    		$common->title_textbox =  trim($request['common']['title_textbox']);
	    		$common->save();

	    		$indicator->indi_points = $request['indicator']['indi_points'];
	    		$indicator->add_points =$request['indicator']['add_points'];
	    		$indicator->save();

	    		foreach ($request['table_indicators'] as $row) {
	    			$table_indicator = new Table_indicator;
	    			$table_indicator->indicator_id = $indicator->id;
	    			$table_indicator->description = trim($row[1]);
	    			$table_indicator->point = trim($row[0]);
	    			$table_indicator->save();
	    		} 
	    	}
    	}catch(\Exception $e){
		    return response()->json(array('edited' => 0));
		}
    	return response()->json(array('edited' => 1));
    }
}