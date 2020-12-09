<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHuongDansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Bảng Hướng dẫn
        Schema::create('HuongDan', function (Blueprint $table) {
            $table->unsignedInteger('MaMon'); //foreignkey
            $table->text('CacBuocLam');
            $table->string('HinhAnh',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('HuongDan');
    }
}
