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
    	$send = self::index_Algotirhm();
    	return view('polls/main_poll_2', ['current_poll' => 'second', 'poll_description' => $send['poll']->description, 'indicator_title' => $send['first_indicator']->name, 'indicator_text' => $send['data_indicator']->main_text, 'edit_active' => false, 'help_text' => $send['help_text']]);
    }

    public function index_edit(){
    	$send = self::index_Algotirhm();
    	return view('polls/main_poll_2', ['current_poll' => 'second', 'poll_description' => $send['poll']->description, 'indicator_title' => $send['first_indicator']->name, 'indicator_text' => $send['data_indicator']->main_text, 'edit_active' => true, 'help_text' => $send['help_text']]);
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
    		$table_data = $indicator->table_indicators()->orderBy('position', 'asc')->get();
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
	    	$custom_poll = Custom_poll::getPollByName($request['custom_polls']['name']);
	    	$indicator = Indicator::getIndicatorByPosition($request['indicator']['position']);

	    	//Update description field in Custom_poll Table
	    	if(array_has($request['custom_polls'], 'description')) Custom_poll::update_description($custom_poll->id, trim($request['custom_polls']['description']));

	    	//Update Indicator table
	    	if(array_has($request, 'indicator')) Indicator::update_indicator($custom_poll->id, $request['indicator']['position'], $request['indicator']);

	    	//Update Data_indicator table
	    	if(array_has($request, 'data_indicator')) Data_indicator::update_data_indicator($indicator->id, $request['data_indicator']);

	    	//Update Common table
	    	if(array_has($request, 'common')) Common::update_common_data($custom_poll->id, $request['common']);

	    	//Delete old rows from Table_indicator table and add new data
	    	if(array_has($request, 'table_indicators')){
	    		Table_indicator::deleteByIndicatorId($indicator->id);
	    		foreach ($request['table_indicators'] as $row) Table_indicator::insertNewData($indicator->id, $row);
	    	}

	    	//Update All fields from Indicator table
	    	if(array_has($request, 'indicators')) foreach ($request['indicators'] as $position => $value) Indicator::update_indicator($custom_poll->id, $position, $value);

    	}catch(\Exception $e){
		    return response()->json(array('edited' => 0));
		}
    	return response()->json(array('edited' => 1));
    }

    public function index_Algotirhm(){
    	$poll = Custom_poll::getPollByName('second');
    	$first_indicator = $poll->indicators->where('position', 1)->first();
    	$data_indicator = $first_indicator->data_indicators->first();
    	$help_text = Common::where('custom_poll_id', $poll->id)->pluck('help_text')->first();
    	return ['poll' => $poll, 'first_indicator' => $first_indicator, 'data_indicator' => $data_indicator, 'help_text' => $help_text];
    }
}