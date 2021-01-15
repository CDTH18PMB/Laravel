<?php

use Illuminate\Database\Seeder;

class TaiKhoan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass = bcrypt(123);
        $data = [
            [
                'username'=>'HoangLam',
                'anhdaidien'=>'HoangLam.jpg',
                'password'=>$pass,
                'hoten'=>'Vũ Hoàng Lâm',
                'sdt'=>'0123456789',
                'email'=>'lam@gmail.com',
                'loaitk'=>'Admin',
                'trangthai'=>1
            ],
            [
                'username'=>'KieuNga',
                'anhdaidien'=>'KieuNga.jpg',
                'password'=>$pass,
                'hoten'=>'Nguyễn Thị Kiều Nga',
                'sdt'=>'0123456789',
                'email'=>'nga@gmail.com',
                'loaitk'=>'User',
                'trangthai'=>1
            ],
            [
                'username'=>'DaiNhan',
                'anhdaidien'=>'DaiNhan.jpg',
                'password'=>$pass,
                'hoten'=>'Nguyễn Võ Đại Nhân',
                'sdt'=>'0123456789',
                'email'=>'nhan@gmail.com',
                'loaitk'=>'User',
                'trangthai'=>1
            ],
            [
                'username'=>'MinhLuan',
                'anhdaidien'=>'MinhLuan.jpg',
                'password'=>$pass,
                'hoten'=>'Lê Minh Luân',
                'sdt'=>'0123456789',
                'email'=>'luan@gmail.com',
                'loaitk'=>'User',
                'trangthai'=>1
            ],
        ];
        
        $insert = DB::table('TaiKhoan')->insert($data);
    }
    }

