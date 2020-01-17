<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;

class NguoiChoi extends Authenticatable implements JWTSubject
{
	
    protected $table = 'nguoi_chois';
    protected $hidden = array('mat_khau');
    protected $fillable= ["mail","ten_dang_nhap"];

    public function getPasswordAttribute()
    {
       return $this->mat_khau;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    use SoftDeletes;

    public function dsGoiCredit()
    {
        return $this->belongsToMany('App\GoiCredit','lich_su_mua_credits','nguoi_choi_id','goi_credit_id','id','id');
    }

    public function luotChoi()
    {
        return $this->hasMany('App\LuotChoi');
    }

}
