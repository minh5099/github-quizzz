<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NguoiChoi extends Model
{
	use SoftDeletes;
    protected $table = 'nguoi_chois';

    public function goiCredit()
    {
    	return $this->hasMany('App\GoiCredit');
    }

    public function luotChoi()
    {
    	return $this->hasMany('App\LuotChoi');
    }
}
