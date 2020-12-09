<?php

use Illuminate\Database\Seeder;

class MonAn extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 10; $i++)
        {
            DB::table('MonAn')->insert([
                'TenMon'=>'Món '.$i,
                'AnhDaiDien'=>'hinh'.$i.'jpg',
                'MoTa'=>Str::random(100),
                'DoKho'=>Str::random(5),
                'ThoiGianNau'=>Str::random(5),
                'NguyenLieu'=>Str::random(100),
                'LuotXem'=>($i*300),
                'LuotThich'=>($i*200),
                'NguoiTao'=>'user_'.(($i%3)+1),
                'LoaiMon'=>(($i%3)+1),
                'TrangThai'=>1,
            ]);
        }
    }
}
