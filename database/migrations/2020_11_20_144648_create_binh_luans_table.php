<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhLuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Bảng Bình luận
        Schema::create('BinhLuan', function (Blueprint $table) {
            $table->unsignedInteger('MaMon');//foreignkey   
            $table->string('Username',20);//foreignkey
            $table->string('NoiDung',100);
            $table->tinyinteger('TrangThai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BinhLuan');
    }
}
