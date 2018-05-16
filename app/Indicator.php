<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
	/*********** Relationships Start **************/

	public function data_indicators()
    {
        return $this->hasMany('App\Data_indicator');
    }

    public function table_indicators()
    {
        return $this->hasMany('App\Table_indicator');
    }

    public function custom_poll()
    {
        return $this->belongsTo('App\Custom_poll');
    }

    /*********** Relationships End ***************/

    public static function getIndicatorByPosition($position){
        return self::where('position', $position)->first();
    }

    public static function update_indicator($cp_id, $position, $indicator_data){
        $indicator = self::where(['custom_poll_id' => $cp_id, 'position' => $position])->first();
        
        if(array_has($indicator_data,'indicator_title')) $indicator->name = trim($indicator_data['indicator_title']);
        if(array_has($indicator_data, 'indi_points'))    $indicator->indi_points = trim($indicator_data['indi_points']);
        if(array_has($indicator_data, 'add_points'))     $indicator->add_points = trim($indicator_data['add_points']);
        if(array_has($indicator_data, 'name'))           $indicator->name = trim($indicator_data['name']);
        if(array_has($indicator_data, 'relevance'))      $indicator->relevance = trim($indicator_data['relevance']);
        $indicator->save();
    }
}
