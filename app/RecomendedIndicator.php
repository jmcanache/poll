<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecomendedIndicator extends Model
{
	/*********** Relationships Start **************/

    public function custom_poll()
    {
        return $this->belongsTo('App\Custom_poll');
    }

    /*********** Relationships End ***************/
}
