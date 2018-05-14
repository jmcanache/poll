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
}
