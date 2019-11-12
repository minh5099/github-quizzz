<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoiCredit extends Model
{
    //
    protected $table = 'goi_credits';

    public function nguoimua()
    {
    	return $this->hasMany('App\NguoiChoi');
    }
}
