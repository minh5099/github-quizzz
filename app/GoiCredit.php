<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoiCredit extends Model
{
    //
    use SoftDeletes;
    protected $table = 'goi_credits';

    public function dsNguoiChoi()
    {
        return $this->belongsToMany('App\NguoiChoi','lich_su_mua_credits','goi_credit_id','nguoi_choi_id','id','id');
    }
}
