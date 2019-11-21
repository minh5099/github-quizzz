<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class QuanTriVien extends Model
{
	use SoftDeletes;
	protected $datas = ['deleted_ad'];
	protected $table = 'quan_tri_viens';
}
