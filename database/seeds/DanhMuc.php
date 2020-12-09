<?php

use Illuminate\Database\Seeder;

class DanhMuc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 4; $i++)
        {
            DB::table('DanhMuc')->insert([
                'TenLoai'=>'Loại '.$i,
                'TrangThai'=>1,
            ]);
        }
    }
}
