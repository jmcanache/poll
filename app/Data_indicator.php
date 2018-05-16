<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_indicator extends Model
{
	/*********** Relationships Start **************/
	
    public function indicator()
    {
        return $this->belongsTo('App\Indicator');
    }

    /*********** Relationships End ***************/

    public static function getDataIndicatorByIndicatorId($indi_id){
        return self::where('indicator_id', $indi_id)->first();
    }

    public static function update_data_indicator($indi_id, $di_data){
    	$data_indicator = self::where('indicator_id', $indi_id)->first();
    	
    	if(array_has($di_data,'main_text')) $data_indicator->main_text = trim($di_data['main_text']);
    	$data_indicator->save();
    }
}
