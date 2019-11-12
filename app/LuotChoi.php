<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuotChoi extends Model
{
	protected $table = 'luot_chois';

    public function luotchoi()
    {
    	return $this->belongsTo('App\NguoiChoi');
    }    
}
