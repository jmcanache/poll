<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Custom_poll;
use Log;

class Common extends Model
{
	/*********** Relationships Start **************/

    public function custom_poll()
    {
        return $this->belongsTo('App\Custom_poll');
    }
    
    /*********** Relationships End ***************/

    public static function update_common_data($cp_id, $common_data){
    	$common = self::where(['custom_poll_id' => $cp_id])->first();
    	
    	if(array_has($common_data,'title_table')) 	$common->title_table = trim($common_data['title_table']);
		if(array_has($common_data, 'th_1')) 	  	$common->th_1 = trim($common_data['th_1']);
		if(array_has($common_data, 'th_2')) 	  	$common->th_2 = trim($common_data['th_2']);
		if(array_has($common_data, 'tf')) 			$common->tf = trim($common_data['tf']);
		if(array_has($common_data, 'stf_1')) 		$common->stf_1 = trim($common_data['stf_1']);
		if(array_has($common_data, 'stf_2')) 		$common->stf_2 = trim($common_data['stf_2']);
		if(array_has($common_data, 'tp')) 			$common->tp = trim($common_data['tp']);
		if(array_has($common_data, 'title_answer')) $common->title_answer = trim($common_data['title_answer']);;
		if(array_has($common_data, 'title_textbox'))$common->title_textbox = trim($common_data['title_textbox']);
		if(array_has($common_data, 'help_text'))    $common->help_text = trim($common_data['help_text']);
		$common->save();
    }
}
