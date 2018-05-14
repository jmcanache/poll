<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Custom_poll;
use App\Indicator;
use App\Data_indicator;
use App\Common;
use App\Table_indicator;
use Log;

class Poll2Controller extends Controller
{
    public function index(){
    	$poll = Custom_poll::where('name', 'second')->first();
    	$first_indicator = $poll->indicators->where('position', 1)->first();

    	$data_indicator = $first_indicator->data_indicators->first();

    	return view('polls/main_poll_2', ['current_poll' => 'second', 'poll_description' => $poll->description, 'indicator_title' => $first_indicator->name, 'indicator_text' => $data_indicator->main_text]);
    }

    public function getNextPageInfo($next_position, $current_poll){
    	$poll =Custom_poll::where('name', 'second')->first();
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
}
