<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;

class NguoiChoi extends Authenticatable implements JWTSubject
{
	
    protected $table = 'nguoi_chois';

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

    public function goiCredit()
    {
        return $this->hasMany('App\GoiCredit');
    }

    public function luotChoi()
    {
        return $this->hasMany('App\LuotChoi');
    }

}
