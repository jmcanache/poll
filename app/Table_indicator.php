<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class Table_indicator extends Model
{
	protected $fillable = ['indicator_id', 'description', 'point', 'position'];

	/*********** Relationships Start **************/
	
    public function indicator()
    {
        return $this->belongsTo('App\Indicator');
    }

    /*********** Relationships End ***************/

    public static function deleteByIndicatorId($indi_id){
    	self::where('indicator_id', $indi_id)->delete();
    }

    public static function insertNewData($indi_id, $ti_data){
    	self::create([
			'indicator_id' => $indi_id,
			'description'  => $ti_data['description'],
			'point'		   => $ti_data['point'],
            'position'     => $ti_data['position'],
		]);
    }
}
