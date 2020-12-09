<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Bảng món ăn
        Schema::table('MonAn', function (Blueprint $table) {
            $table->foreign('NguoiTao')->references('username')->on('TaiKhoan');
            $table->foreign('LoaiMon')->references('MaLoai')->on('DanhMuc');
        });

        //Bảng HuongDan
        Schema::table('HuongDan', function (Blueprint $table) {
            $table->foreign('MaMon')->references('MaMon')->on('MonAn');
        });

        //Bảng Món ăn đã thích
        Schema::table('MonAnDaThich', function (Blueprint $table) {
            $table->foreign('Username')->references('username')->on('TaiKhoan');
            $table->foreign('MaMon')->references('MaMon')->on('MonAn');
        });

        //Bảng Bình luận
        Schema::table('BinhLuan', function (Blueprint $table) {
            $table->foreign('MaMon')->references('MaMon')->on('MonAn');
            $table->foreign('Username')->references('username')->on('TaiKhoan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
