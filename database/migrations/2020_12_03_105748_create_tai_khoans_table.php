<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaiKhoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TaiKhoan', function (Blueprint $table) {
            $table->string('username');
            $table->primary('username');

            $table->string('AnhDaiDien');
            $table->string('password');
            $table->string('HoTen',50);
            $table->char('SDT',10);
            $table->string('Email',100);
            $table->string('LoaiTK',20);
            $table->rememberToken();
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
        Schema::dropIfExists('TaiKhoan');
    }
}
