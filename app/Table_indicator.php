<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table_indicator extends Model
{
	/*********** Relationships Start **************/
	
    public function indicator()
    {
        return $this->belongsTo('App\Indicator');
    }

    /*********** Relationships End ***************/
}
