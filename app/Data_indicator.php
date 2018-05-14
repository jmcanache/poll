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
}
