<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietLuotChoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_luot_chois', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('luot_choi_id');
            $table->unsignedInteger('cau_hoi_id');
            $table->text('phuong_an');
            $table->integer('diem');
            $table->foreign('cau_hoi_id')->references('id')->on('cau_hois')->onDelete('cascade');
            $table->foreign('luot_choi_id')->references('id')->on('linh_vucs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_luot_chois');
    }
}
