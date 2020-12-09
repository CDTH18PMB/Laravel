<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonAnDaThichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Bảng Món ăn đã thích
        Schema::create('MonAnDaThich', function (Blueprint $table) {
            $table->string('Username',20);//foreignkey
            $table->unsignedInteger('MaMon');//foreignkey       
            $table->string('TenMon',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MonAnDaThich');
    }
}
