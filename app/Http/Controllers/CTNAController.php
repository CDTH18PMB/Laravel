<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\MonAn;
use App\HuongDan;
use App\DanhMuc;
use App\TaiKhoan;
use App\MonAnDaThich;
use App\BinhLuan;

class CTNAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    /*============================================================================================================================ */
    public function index()
    {
        $dsMonAn = MonAn::all();
        return view('index',['dsMonAn'=>$dsMonAn]);
    }

    public function danhmuc()
    {
        $dsDanhMuc = DanhMuc::all();
        return view('danhmuc', ['dsDanhMuc'=>$dsDanhMuc]);
    }

    public function duyet()
    {
        return view('duyetcongthuc',['data'=>'data']);
    }

    public function binhluan()
    {
        return view('binhluan', ['data'=>'data']);
    }

    public function taikhoan()
    {
        $dsTaiKhoan = TaiKhoan::all();
        return view('TaiKhoan', ['dsTaiKhoan'=>$dsTaiKhoan]);
    }

    /**========================================================================================================================
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create_monan()
    {
        $dsDanhMuc = DanhMuc::all();
        return view('create_monan', ['dsDanhMuc'=>$dsDanhMuc]);
    }

    public function create_danhmuc()
    {
        return view('create_danhmuc');
    }

    public function create_taikhoan()
    {
        return view('create_taikhoan');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_MonAn(Request $request)
    {
        //$request: lấy thuộc tính name từ các thẻ input trong form
        $TenMon = $request->TenMon;
        $AnhDaiDien = 'hinhanh';
        $MoTa = $request->MoTa;
        $DoKho = $request->DoKho;
        $ThoiGianNau = $request->ThoiGianNau;
        $NguyenLieu = $request->NguyenLieu;
        $LuotXem = $request->LuotXem;
        $LuotThich = $request->LuotThich;
        $NguoiTao = 'User_1';
        $LoaiMon = $request->LoaiMon;
        $TrangThai = 1;

        $insert_monan = MonAn::create([
            'TenMon'=>$TenMon,
            'AnhDaiDien'=>$AnhDaiDien,
            'MoTa'=>$MoTa,
            'DoKho'=>$DoKho,
            'ThoiGianNau'=>$ThoiGianNau,
            'NguyenLieu'=>$NguyenLieu,
            'LuotXem'=>0,
            'LuotThich'=>0,
            'NguoiTao'=>$NguoiTao,
            'LoaiMon'=>$LoaiMon,
            'TrangThai'=>$TrangThai
        ]);

        $dsMonAn = MonAn::all();
        return redirect('/')->route('CTNA.index',['dsMonAn'=>$dsMonAn]);
    }

    //=============================================================================================================

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_MonAn($id)
    {
        // load món ăn theo id
        $chitiet_monan = MonAn::where('MaMon', '=', $id)->get();

        // lấy ra tên loại món
        $loaimon = $chitiet_monan[0]->LoaiMon;
        $danhmuc = DanhMuc::where('MaLoai', $loaimon)->get();
        $tenloai = $danhmuc[0]->TenLoai;

        // dánh sách danh mục
        $dsDanhMuc = DanhMuc::all();

        // các bước làm
        $dsHuongDan = HuongDan::where('MaMon', '=', $id)->get();

        $arr = [
            'chitiet_monan'=>$chitiet_monan,
            'dsDanhMuc'=>$dsDanhMuc,
            'dsHuongDan'=>$dsHuongDan,
            'loaimon'=>$loaimon,
            'tenloai'=>$tenloai,
        ];

        return view('chitiet_monan',$arr);
    }

    public function show_TaiKhoan($id)
    {
        $chitiet_taikhoan = TaiKhoan::where('Username', '=', $id)->get();
        
        return view('chitiet_taikhoan', ['chitiet_taikhoan'=>$chitiet_taikhoan]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_MonAn(Request $request, $id)
    {
        $TenMon = $request->TenMon;
        $AnhDaiDien = 'hinhanh';
        $MoTa = $request->MoTa;
        $DoKho = $request->DoKho;
        $ThoiGianNau = $request->ThoiGianNau;
        $NguyenLieu = $request->NguyenLieu;
        $LuotXem = $request->LuotXem;
        $LuotThich = $request->LuotThich;
        $NguoiTao = $request->NguoiTao;
        $LoaiMon = $request->LoaiMon;
        $TrangThai = 1;

        MonAn::where('MaMon', '=', $id)->update([
            'TenMon'=>$TenMon,
            'AnhDaiDien'=>$AnhDaiDien,
            'MoTa'=>$MoTa,
            'DoKho'=>$DoKho,
            'ThoiGianNau'=>$ThoiGianNau,
            'NguyenLieu'=>$NguyenLieu,
            'LuotXem'=>$LuotXem,
            'LuotThich'=>$LuotThich,
            'NguoiTao'=>$NguoiTao,
            'LoaiMon'=>$LoaiMon,
            'TrangThai'=>$TrangThai
        ]);

        $dsMonAn = DB::table('MonAn')->get();
        return redirect()->route('CTNA.index',['dsMonAn'=>$dsMonAn]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_MonAn($id)
    {
        DB::table('MonAn')->where('MaMon',$id)->update(['TrangThai'=>0]);

        $dsMonAn = DB::table('MonAn')->get();
        return redirect()->route('CTNA.index',['dsMonAn'=>$dsMonAn]);
    }
}
