<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom_poll extends Model
{
	/*********** Relationships Start **************/

    public function common()
    {
        return $this->hasOne('App\Common');
    }

    public function indicators()
    {
        return $this->hasMany('App\Indicator');
    }

    public function recomendedIndicators()
    {
        return $this->hasMany('App\RecomendedIndicator');
    }
    
    /*********** Relationships End ***************/

    public static function getPollByName($name){
        return self::where('name', $name)->first();
    }

    public static function update_description($cp_id, $cp_data){
        $cp = self::find($cp_id);
        $cp->description = $cp_data;
        $cp->save();
    }
}
