<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhMucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Bảng Danh mục
        Schema::create('DanhMuc', function (Blueprint $table) {
            $table->increments('MaLoai');
            $table->string('TenLoai',50);
            $table->tinyinteger('TrangThai');
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
        Schema::dropIfExists('DanhMuc');
    }
}
