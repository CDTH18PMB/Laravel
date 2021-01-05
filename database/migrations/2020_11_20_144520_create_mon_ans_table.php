<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Bảng món ăn
        Schema::create('MonAn', function (Blueprint $table) {
            $table->increments('MaMon');
            $table->string('TenMon',100);
            $table->string('AnhDaiDien',50);
            $table->text('MoTa');
            $table->string('DoKho',10);
            $table->string('ThoiGianNau',50);
            $table->text('NguyenLieu');
            $table->integer('LuotXem');
            $table->integer('LuotThich');
            $table->string('NguoiTao',20); //foreignkey
            $table->unsignedInteger('LoaiMon');
            $table->integer('TrangThai');
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
        Schema::dropIfExists('MonAn');
    }
}
