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
        $data = [
            [
                'username'=>'HoangLam',
                'anhdaidien'=>'hinhanh.jpg',
                'password'=>bcrypt('123'),
                'hoten'=>'Vũ Hoàng Lâm',
                'sdt'=>'0123456789',
                'email'=>'lam@gmail.com',
                'loaitk'=>'Admin',
                'trangthai'=>1
            ],
            [
                'username'=>'KieuNga',
                'anhdaidien'=>'hinhanh.jpg',
                'password'=>bcrypt('123'),
                'hoten'=>'Nguyễn Thị Kiều Nga',
                'sdt'=>'0123456789',
                'email'=>'nga@gmail.com',
                'loaitk'=>'User',
                'trangthai'=>0
            ],
            [
                'username'=>'DaiNhan',
                'anhdaidien'=>'hinhanh.jpg',
                'password'=>bcrypt('123'),
                'hoten'=>'Nguyễn Võ Đại Nhân',
                'sdt'=>'0123456789',
                'email'=>'nhan@gmail.com',
                'loaitk'=>'User',
                'trangthai'=>0
            ],
            [
                'username'=>'MinhLuan',
                'anhdaidien'=>'hinhanh.jpg',
                'password'=>bcrypt('123'),
                'hoten'=>'Lê Minh Luân',
                'sdt'=>'0123456789',
                'email'=>'luan@gmail.com',
                'loaitk'=>'User',
                'trangthai'=>0
            ],
        ];
        
        $insert = DB::table('TaiKhoan')->insert($data);
    }
    }

