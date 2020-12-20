<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use File;
use Storage;

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
        $dsMonAn = MonAn::paginate(10);
        $dsDanhMuc = DanhMuc::all();
        $arr = [
            'dsMonAn'=>$dsMonAn,
            'dsDanhMuc'=>$dsDanhMuc,
        ];
        return view('index')->with($arr);
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
        return view('create_monan', ['dsDanhMuc'=>$dsDanhMuc,'Step'=>1]);
    }

    // thêm bước mới sử dụng ajax
    public function addStep(Request $request)
    {
        if($request->ajax())
        {
            $count = $request->count;
            $arr = $request->arr;
            
            
            $str = "
                <div id='div_buoc_$count' class='row' style='margin-bottom:25px'>
                    <div class='col-sm-4'>
                        <img src='../images/No-image.jpg' alt='Hình ảnh' id='img_Buoc_$count' style='width: 100%; height: 240px'>
                        <span class='btn btn-outline-dark btn-file'>Đổi hình<input type='file' name='inp_Buoc_$count' id='inp_Buoc_$count'></span>
                    </div>
                    <div class='col-sm-8'>
                        <textarea id='Buoc_$count' name='Buoc_$count' cols='30' rows='11' class='form-control'></textarea>
                    </div>
                </div>  
                ";
            
            return $str;
        }
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
        //======================== lưu món ăn ==================================

        $TenMon = $request->TenMon;
        $AnhDaiDien = 'anhdaidien.jpg';
        $MoTa = $request->MoTa;
        $DoKho = $request->DoKho;
        $ThoiGianNau = $request->ThoiGianNau;
        $NguyenLieu = $request->NguyenLieu;
        $LuotXem = $request->LuotXem;
        $LuotThich = $request->LuotThich;
        $NguoiTao = 'HoangLam';
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


        // lưu ảnh đại diện
        $url = 'images/'.$TenMon; // đường dẫn để lưu

        if($request->hasFile('inp_Create_MonAn'))
        {
            $file = $request->inp_Create_MonAn;
            $file->move($url,$AnhDaiDien); // di chuyển hình vào đường dẫn ở trên
        }

        // // lưu hình các bước làm
        $count = $request->count; // lấy số lượng bước làm
        
        for($i = 1; $i <= $count; $i++)
        {
            $inp = 'inp_Buoc_'.$i; // tên thẻ input type=file
            if($request->hasFile($inp))
            {
                $file = $request->$inp;
                $img_name = 'buoc'.$i.'.jpg'; // vd: buoc1.jpg
                $file->move($url,$img_name); // di chuyển hình vào đường dẫn ở trên
            }
        }
        
        //======================== Lưu các bước làm =================================
        
        // lấy ra mã món ăn
        $temp = MonAn::where('TenMon', $TenMon)->get();
        $MaMon = $temp[0]->MaMon;
        
        for($i = 1; $i <= $count; $i++)
        {
            $temp = 'Buoc_'.$i; $hinhanh = 'buoc'.$i.'.jpg';
            $CacBuocLam = $request->$temp;
            $HinhAnh = $hinhanh;

            $insert_huongdan = HuongDan::create([
                'MaMon'=>$MaMon,
                'CacBuocLam'=>$CacBuocLam,
                'HinhAnh'=>$HinhAnh,
            ]);
        }


        $dsMonAn = MonAn::all();
        return redirect('/');
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

        // danh sách tài khoản
        $dsTaiKhoan = TaiKhoan::all();

        // các bước làm
        $dsHuongDan = HuongDan::where('MaMon', '=', $id)->get();

        $arr = [
            'chitiet_monan'=>$chitiet_monan,
            'dsDanhMuc'=>$dsDanhMuc,
            'dsTaiKhoan'=>$dsTaiKhoan,
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
        //====================================== Thay đổi thư mục hình ====================================
        $AnhDaiDien = 'anhdaidien.jpg';
        $count = $request->count; // lấy số lượng bước làm

        $temp = MonAn::where('MaMon',$id)->get();
        $old_name = $temp[0]->TenMon; // tên món ăn cũ
        $new_name = $request->TenMon; // tên món ăn mới

        $url = 'images/'.$old_name; // đường dẫn để lưu
        if($old_name != $new_name) // nếu 2 tên món ăn khác nhau thì đổi tên thư mục
        {
            // đổi tên thư mục
            Storage::rename('images/'.$old_name, 'images/'.$new_name);

            // cập nhật lại đường dẫn
            $url = 'images/'.$new_name; 
        }

        if($request->hasFile('inp_Create_MonAn'))
        {
            $file = $request->inp_Create_MonAn;
            $file->move($url,$AnhDaiDien); // di chuyển hình vào đường dẫn ở trên
        }
        // lưu hình các bước làm
        for($i = 1; $i <= $count; $i++)
        {
            $inp = 'inp_Buoc_'.$i; // tên thẻ input type=file
            if($request->hasFile($inp))
            {
                $file = $request->$inp;
                $img_name = 'buoc'.$i.'.jpg'; // vd: buoc1.jpg
                $file->move($url,$img_name); // di chuyển hình vào đường dẫn ở trên
            }
        }

    
        //======================================= cập nhật món ăn =====================================
        $TenMon = $request->TenMon;
        $MoTa = $request->MoTa;
        $DoKho = $request->DoKho;
        $ThoiGianNau = $request->ThoiGianNau;
        $NguyenLieu = $request->NguyenLieu;
        $LuotXem = $request->LuotXem;
        $LuotThich = $request->LuotThich;
        $NguoiTao = $request->NguoiTao;
        $LoaiMon = $request->LoaiMon;
        $TrangThai = 1;

        $update_monan = MonAn::where('MaMon', $id)->update([
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

        //======================================= cập nhật hướng dẫn =====================================
        $dsHuongDan = count(HuongDan::where('MaMon', $id)->get()); // lấy số lượng bước làm
        if($dsHuongDan < $count) // nếu nhấn thêm bước thì count luôn lớn hơn
        {
           $kq = $count - $dsHuongDan;
           for($i = $dsHuongDan + 1; $i <= $count; $i++) // thêm những bước mới vào csdl
           {
                $temp = 'Buoc_'.$i; $hinhanh = 'buoc'.$i.'.jpg';
                $CacBuocLam = $request->$temp;
                $HinhAnh = $hinhanh;

                $insert_huongdan = HuongDan::create([
                    'MaMon'=>$id,
                    'CacBuocLam'=>$CacBuocLam,
                    'HinhAnh'=>$HinhAnh,
                ]);
           } 
        }
        for($i = 1; $i <= $dsHuongDan; $i++)
        {
            $temp = 'buoc'.$i.'.jpg';
            $HinhAnh = $temp;
            $temp = 'Buoc_'.$i;
            $CacBuocLam = $request->$temp;

            $update_huongdan = HuongDan::where([['MaMon', $id],['HinhAnh', $HinhAnh]])->update([
                'CacBuocLam'=>$CacBuocLam,
            ]);
        }

        $dsMonAn = MonAn::all();
        return redirect('/')->with('update_success', 'Cập nhật món ăn thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $delete_monan = MonAn::where('MaMon', $id)->update(['TrangThai'=>0]);

        $dsMonAn = MonAn::all();
        return redirect('/');
    }

    public function restore($id)
    {
        $restore = MonAn::where('MaMon', $id)->update(['TrangThai'=>1]);
        return redirect('/');
    }

    public function filter_monan()
    {

    }

    public function CheckLogin()
    {
        // $username = $request->username;
        // $password = $request->password;

        // $data = [
        //     'username'=>$username,
        //     'password'=>$password,
        // ];

        // if(Auth::attempt($data))
        // {
        //     return 'success';
        // }
        // else
        // {
        //     return 'false';
        // }
        return 'success';
    }
}
