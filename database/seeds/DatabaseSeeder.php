<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DanhMuc::class,
            TaiKhoan::class,
            //MonAn::class,
            //HuongDan::Class,
            //BinhLuan::Class
        ]);
    }
}
