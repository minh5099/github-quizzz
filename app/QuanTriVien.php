<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\SoftDeletes;

class QuanTriVien extends Authenticatable
{
	use SoftDeletes;
	protected $datas = ['deleted_ad'];
	protected $table = 'quan_tri_viens';
	
}
