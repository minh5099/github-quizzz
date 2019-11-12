<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiChoi extends Model
{
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
