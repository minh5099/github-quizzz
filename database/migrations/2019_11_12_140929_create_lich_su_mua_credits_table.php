<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichSuMuaCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_su_mua_credits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('nguoi_choi_id');
            $table->unsignedInteger('goi_credit_id');
            $table->integer('credit');
            $table->integer('so_tien');
            $table->foreign('nguoi_choi_id')->references('id')->on('nguoi_chois')->onDelete('cascade');
            $table->foreign('goi_credit_id')->references('id')->on('goi_credits')->onDelete('cascade');
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
        Schema::dropIfExists('lich_su_mua_credits');
    }
}
