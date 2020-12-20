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
    // public function APITaiKhoan(){
    //     $dsTaiKhoan = TaiKhoan::all();//lấy all dữ liệu trong model
    //     return response()->json($dsTaiKhoan);

    // }

    // public function store_apitaikhoan($id){
    //     $dsTaiKhoan1 = TaiKhoan::where('username','=',$id)->get();
    //     return response()->json($dsTaiKhoan1,201);
    // }
    
    // public function APITaiKhoan1(Request $request){
        
    //     $LoaiTK = 'User';
    //     $TrangThai = 1;

    //     $insert_monan = MonAn::create([
    //         'username'=>$request->username,
    //         'AnhDaiDien'=>$request->AnhDaiDien,
    //         'password'=>$request->password,
    //         'HoTen'=>$request->HoTen,
    //         'SDT'=>$request->SDT,
    //         'Email'=>$request->Email,
    //         'LoaiTK'=>$LoaiTK,
    //         'TrangThai'=>$TrangThai
    //     ]);
    //     return response()->json($insert_monan);

    // }
    // public function APIMonAn(){
    //     $dsMonAn1 = MonAn::all();//lấy all dữ liệu trong model
    //     return response()->json($dsMonAn1);

    // }
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
    //Lấy dữ liệu bảng món ăn
    public function duyet()
    {
        $dsDuyetCongThuc = MonAn::all();
        return view('duyetcongthuc',['dsDuyetCongThuc'=>$dsDuyetCongThuc]);
    }
    //Lấy dữ liệu bảng bình luận
    public function binhluan()
    {
        $dsBinhLuan = BinhLuan::all();
        return view('binhluan', ['dsBinhLuan'=>$dsBinhLuan]);
    }
 //api dm
 public function APIDanhMuc(Request $request)
 {
     $danhmuc=DanhMuc::all();
     return response()->json($danhmuc);
 }
 public function store(Request $request,$id)
 {
     $danhmuc=DanhMuc::where('MaLoai','=',$id)->get();
     return response()->json($danhmuc,201);
    
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

    public function create_monan($steps)
    {
        $dsDanhMuc = DanhMuc::all();
        return view('create_monan', ['dsDanhMuc'=>$dsDanhMuc, 'steps'=>$steps]);
    }

    public function addStep($steps)
    {
        $dsDanhMuc = DanhMuc::all();
        return redirect()->route('CTNA.create_monan', ['dsDanhMuc'=>$dsDanhMuc, 'steps'=>$steps]);
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
    public function store_MonAn(Request $request, $steps)
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

        $loop = $steps;
        $mamon = MonAn::count();
        for($i = 1; $i <= $loop; $i++)
        {
            $BuocLam = $request->input('Buoc_'.$i);
            
            $insert_huongdan = HuongDan::create([
                'MaMon'=>$mamon,
                'CacBuocLam'=>$BuocLam,
                'HinhAnh'=>'hinhanh.jpg'
            ]);
        }
        

        $dsMonAn = MonAn::all();
        return redirect()->route('CTNA.index',['dsMonAn'=>$dsMonAn]);
    }
//store_DanhMuc
public function store_DanhMuc(Request $request)
{
    $TenLoai = $request->TenLoai;
    $TrangThai = 1;


    DB::table('DanhMuc')->insert([
        'TenLoai'=>$TenLoai,
        'TrangThai'=>$TrangThai,
        
    ]);

    $dsDanhMuc = DanhMuc::all();
    return view('danhmuc',['dsDanhMuc'=>$dsDanhMuc]);
}
//sua danh muc
public function show_update_DanhMuc(Request $request,$id)
{
    $TenLoai = $request->TenLoai;
    $TrangThai = 1;


    DanhMuc::where('MaLoai', '=', $id)->update([
        'TenLoai'=>$TenLoai,
        'TrangThai'=>$TrangThai
    ]);
    $dsDanhMuc = DB::table('DanhMuc')->get();
    return redirect()->route('CTNA.danhmuc',['dsDanhMuc'=>$dsDanhMuc]);
    
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
        $chitiet_monan = MonAn::where('MaMon', '=', $id)->get();


        $dsDanhMuc = DanhMuc::all();

        $dsHuongDan = HuongDan::where('MaMon', '=', $id)->get();

        return view('chitiet_monan',['chitiet_monan'=>$chitiet_monan, 'dsDanhMuc'=>$dsDanhMuc,
                                    'dsHuongDan'=>$dsHuongDan]);
    }

    public function show_TaiKhoan($id)
    {
        $chitiet_taikhoan = TaiKhoan::where('Username', '=', $id)->get();
        
        return view('chitiet_taikhoan', ['chitiet_taikhoan'=>$chitiet_taikhoan]);
    }
    public function show_DanhMuc($id)
    {
        $chitiet_danhmuc = DanhMuc::where('MaLoai', '=', $id)->get();
        
        return view('chitiet_danhmuc', ['chitiet_danhmuc'=>$chitiet_danhmuc]);
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
    //Duyệt bình luận
    public function allow_comment(Request $request){
        $data = $request->all();
        $dsBinhLuan = BinhLuan::where('MaMon',$data['MaMon'])->update(['TrangThai'=>1]);

    }
    //Xoá bình luận
    public function delete_comment(Request $request){
        $data = $request->all();
        $dsBinhLuan = BinhLuan::where('MaMon',$data['MaMon'])->delete(['TrangThai']);

    }
    //Duyệt Công thức
    public function allow_cook(Request $request){
        $data = $request->all();
        $dsDuyetCongThuc = MonAn::where('MaMon',$data['MaMon'])->update(['TrangThai'=>1]);
    }
    //Xoá công thức
    public function delete_cook(Request $request){
        $data = $request->all();
        $dsDuyetCongThuc = MonAn::where('MaMon',$data['MaMon'])->delete(['TrangThai']);

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
      //xoa danh muc
      public function destroy_DanhMuc($id)
      {
          DB::table('DanhMuc')->where('MaLoai',$id)->update(['TrangThai'=>0]);
  
          $dsDanhMuc = DB::table('DanhMuc')->get();
          return redirect()->route('CTNA.danhmuc',['dsDanhMuc'=>$dsDanhMuc]);
      }

      //tim kiem danh muc
    public function TimKiem(Request $request){
        $dsDanhMuc=DanhMuc::where('TenLoai','like','%'.$request->key.'%')
        ->where('TrangThai',1)->get();
         return view('search',compact('dsDanhMuc'));
    }

    //tìm kiếm
    public function getSearch(Request $request)
    {
        
        return view('chitiet_monan');
    }
    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('MonAn')
            ->where('TenMon', 'LIKE', "%{$query}%")//truy vấn lấy tên món ăn
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
               $output .= '
               <li><a href="/MonAn/'. $row->MaMon .'">'.$row->TenMon.'</a></li> 
               ';
           } 
           //url-> tương đương route CTNA.show_monan
           $output .= '</ul>';
           echo $output;
       }
    }
}
