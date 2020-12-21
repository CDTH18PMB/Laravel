<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\MonAn;
use App\HuongDan;
use App\DanhMuc;
use App\TaiKhoan;
use App\MonAnDaThich;
use App\BinhLuan;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsMonAn = MonAn::all();
        return response()->json($dsMonAn);
    }

    public function DanhMuc()
    {
        $dsDanhMuc = ['DanhMuc'=>DanhMuc::all()];
        return response()->json($dsDanhMuc);
    }

    public function TaiKhoan()
    {
        $dsTaiKhoan = ['TaiKhoan'=>TaiKhoan::all()];
        return response()->json($dsTaiKhoan);
    }

    //==================================================================================================

    // api kiểm tra đăng nhập
    public function CheckLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = ['username'=>$username, 'password'=>$password, 'TrangThai'=>1];
        if(Auth::attempt($data))
        {
            $dsTaiKhoan = ['TaiKhoan'=>TaiKhoan::where('username', $username)->get()];
            return response()->json($dsTaiKhoan);
        }
        else
        {
            return 'false';
        }
    }

    // api tạo công thức mới
    public function Create_MonAn()
    {
        $tenmon = $_POST['TenMon'];
        $anhdaidien = $_POST['AnhDaiDien'];
        $mota = $_POST['MoTa'];
        $dokho = $_POST['DoKho'];
        $thoigiannau = $_POST['ThoiGianNau'];
        $nguyenlieu = $_POST['NguyenLieu'];
        $luotxem = $_POST['LuotXem'];
        $luotthich = $_POST['LuotThich'];
        $nguoitao = $_POST['NguoiTao'];
        $loaimon = $_POST['LoaiMon'];
        $trangthai = $_POST['TrangThai'];

        $data = [
            'TenMon'=>$tenmon,
            'AnhDaiDien'=>$anhdaidien,
            'MoTa'=>$mota,
            'DoKho'=>$dokho,
            'ThoiGianNau'=>$thoigiannau,
            'NguyenLieu'=>$nguyenlieu,
            'LuotXem'=>$luotxem,
            'LuotThich'=>$luotthich,
            'NguoiTao'=>$nguoitao,
            'LoaiMon'=>$loaimon,
            'TrangThai'=>$trangthai,
        ];

        $insert = MonAn::create($data);

        if($insert)
        {
            return 'success';
        }
        return 'fail';
    }
}
