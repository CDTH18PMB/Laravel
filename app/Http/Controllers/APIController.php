<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

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

    //============================================ GET API ====================================================
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

    public function ChiTietMonAn($id)
    {
        $dsMonAn = MonAn::where('MaMon', $id)->get();
        return response()->json($dsMonAn);
    }

    public function HuongDan($id)
    {
        $HuongDan = HuongDan::where('MaMon', $id)->get();
        return response()->json($HuongDan);
    }

    //=================================================== Login ==============================================

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
            return 'fail';
        }
    }

    public function CheckLoginEXP(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = ['username'=>$username, 'password'=>$password, 'trangthai'=>1];
        if(Auth::attempt($data)){

        }
    }

    //=====================================================================================================

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
        $img = $_POST['Image'];

        $url = 'images/'.$tenmon.'/'.$anhdaidien;

        $img = str_replace('data:image/jpg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        
        Storage::put($url, $data);

        $data_monam = [
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

        $insert = MonAn::create($data_monam);

        return 'success';
    }

    // api tạo hướng dẫn cho món ăn
    public function Create_HuongDan()
    {
        $temp = MonAn::orderBy('MaMon', 'desc')->get();
        $mamon = $temp[0]->MaMon;
        $tenmon = $temp[0]->TenMon;
        $huongdan = $_POST['HuongDan'];
        $jsonArray = json_decode($huongdan, true);

        for($i = 0; $i < count($jsonArray); $i++)
        {
            // lưu hình các bước làm
            $url = 'images/'.$tenmon.'/'.'buoc'.($i+1).'.jpg';
            $img = $jsonArray[$i]['encodeImage'];

            $img = str_replace('data:image/jpg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
        
            Storage::put($url, $data);

            // lưu các bước làm vào csdl
            $data = [
                'MaMon'=>$mamon,
                'CacBuocLam'=>$jsonArray[$i]['contentStep'],
                'HinhAnh'=>'buoc'.($i + 1).'.jpg',
            ];
            $insert = HuongDan::create($data);
        }

        
        return 'success';
    }
    
    //====================================================================================================
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

        // public function store(Request $request,$id)
        // {
        //     $danhmuc=DanhMuc::where('MaLoai','=',$id)->get();
        //     return response()->json($danhmuc,201);
        // }
    // }

    //=========================================== Tài Khoản =======================================
    //  danh sách tài khoản
    public function index_taikhoan()
    {
        // $TaiKhoan =  TaiKhoan::all();
        $TaiKhoan = TaiKhoan::where("TrangThai","=","1")->get();
        return response()->json($TaiKhoan);
        // return TaiKhoanResource::collection($TaiKhoan);
    }
    //  thêm TK
    public function create_taikhoan(Request $request)
    {
        $LoaiTK     = 'User';
        $TrangThai  = 1;
        $username   = $request->username;
        TaiKhoan::insert([
            'username'  => $request->username,
            'AnhDaiDien'=> $request->AnhDaiDien,
            'password'  => bcrypt($request->password),
            'HoTen'     => $request->HoTen,
            'SDT'       => $request->SDT,
            'Email'     => $request->Email,
            'LoaiTK'    => $LoaiTK,
            'TrangThai' => $TrangThai,
        ]);
        $TaiKhoan = TaiKhoan::where('username', $request->username)->get();
        return response()->json($TaiKhoan);
        // return TaiKhoanResource::collection($TaiKhoan);
    }
    //  chi tiết TK
    public function detail_taikhoan($username)
    {
        $TaiKhoan   = TaiKhoan::where('username', $username)->get();
        return response()->json($TaiKhoan);
        // return TaiKhoanResource::collection($TaiKhoan);
    }
    //  cập nhật
    public function update_taikhoan(Request $request, $username)
    {
        if($request->password == ""){
            TaiKhoan::where('username',$username)->update([
                'username'  => $request->username,
                'AnhDaiDien'=> $request->AnhDaiDien,
                'HoTen'     => $request->HoTen,
                'SDT'       => $request->SDT,
                'Email'     => $request->Email,
            ]);}
        else{
            TaiKhoan::where('username',$username)->update([
                'username'  => $request->username,
                'AnhDaiDien'=>$request->AnhDaiDien,
                'password'  =>  bcrypt($request->password),
                'HoTen'     => $request->HoTen,
                'SDT'       => $request->SDT,
                'Email'     => $request->Email,
            ]);}
        $taikhoan = TaiKhoan::where('username',$username)->get();
        return response()->json($TaiKhoan);
        // return TaikhoanResource::collection($taikhoan);
    }
    // xoá TK
    public function delete_taikhoan($username)
    {
        TaiKhoan::where('username',$username)->delete();
        return response()->json("Xoá thành công");
    }
    //  danh sách món dã tạo
    public function show_mondatao($nguoitao)
    {
        // $mondatao = MonAn::where('nguoitao',$nguoitao)->get();
        $mondatao = MonAn::where([['nguoitao',$nguoitao], ['TrangThai','=','1']])->get();
        return response()->json($mondatao);
    }
    //  danh sách món đã thích
    public function show_mondathich($username)
    {
        $monandathich = DB::table('MonAnDaThich')->join('MonAn', 'MonAn.MaMon', '=', 'MonAnDaThich.MaMon')
        ->where([['MonAnDaThich.Username', '=', $username],['MonAn.TrangThai','=','1']])
        ->get();
        return response()->json($monandathich);
    }
    //  tăng lượt xem
    public function plus_luotxem(Request $request, $id)
    {
        MonAn::where("MaMon",$id)->update(['LuotXem' => $request->LuotXem,]);
        return response()->json("Success");
    }
    // cập nhật trạng thái xoá
    public function delete_mondatao($id)
    {
        MonAn::where('MaMon',$id)->update(['TrangThai'=>0]);
        return response()->json("Success");
    }
    public function unlike_mondathich(Request $request, $id)
    {
        MonAn::where('MaMon',$id)->update(['luotthich'=>$request->luotthich]);
        MonAnDaThich::where([['MaMon',$id],['Username','=',$request->Username ]])->delete();
        return response()->json("Success");
    }
}
