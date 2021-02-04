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

    //====================================== MÓN ĂN ==================================================

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

            $str = "
                <div id='div_buoc_$count' class='row' style='margin-bottom:25px'>
                    <div class='col-sm-4'>
                        <img src='../images/No-image.jpg' alt='Hình ảnh' id='img_Buoc_$count' style='width: 100%; height: 240px'>
                        <span class='btn btn-outline-dark btn-file'>Đổi hình
                            <input type='file' class='inputfile' data-id='#img_Buoc_$count #inp_Buoc_$count' name='inp_Buoc_$count' id='inp_Buoc_$count' accept='image/*' required>
                        </span>
                    </div>
                    <div class='col-sm-8'>
                        <textarea id='Buoc_$count' name='Buoc_$count' cols='30' rows='11' class='form-control'></textarea>
                    </div>
                </div>  
                ";
            
            return $str;
        }
    }

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

    // ajax lọc món ăn
    public function filter_monan(Request $request)
    {
        $maloai = $request->maloai;
        $select = MonAn::where('LoaiMon', $maloai)->get();

        $str = '';

        if(count($select) == 0){
            return 'fail';
        }

        foreach($select as $item){
            $str.="
                <tr class='size-12'>
                    <td style='padding:70px 0'>$item->MaMon</td>
                    <td style='padding:70px 0'>$item->TenMon</td>
                    <td><img src='images/$item->TenMon/anhdaidien.jpg' alt='image' style='width:250px; height:150px'></td>
                    <td style='padding:70px 0'>$item->DoKho</td>
                    <td style='padding:70px 0'>$item->ThoiGianNau</td>
                    <td style='padding:70px 0'>$item->NguoiTao</td>
                    <td style='padding:70px 0'>
                        $item->TrangThai
                    </td>
                    <td style='padding:60px 0'><a href='MonAn/$item->MaMon'><button class='btn btn-info'>Chi tiết</button></a></td>
                </tr>
            ";
        }

        return $str;
    }

    // ajax sắp xếp món ăn
    public function sort_monan(Request $request){
        $dokho = $request->dokho;

        if($dokho == ''){
            return 'fail';
        }

        $select = MonAn::where('DoKho', 'like', '%'.$dokho.'%')->get();
        
        if(count($select) == 0){
            return 'fail';
        }

        $str = '';

        foreach($select as $item){
            $str.="
                <tr class='size-12'>
                    <td style='padding:70px 0'>$item->MaMon</td>
                    <td style='padding:70px 0'>$item->TenMon</td>
                    <td><img src='images/$item->TenMon/anhdaidien.jpg' alt='image' style='width:250px; height:150px'></td>
                    <td style='padding:70px 0'>$item->DoKho</td>
                    <td style='padding:70px 0'>$item->ThoiGianNau</td>
                    <td style='padding:70px 0'>$item->NguoiTao</td>
                    <td style='padding:70px 0'>
                        $item->TrangThai
                    </td>
                    <td style='padding:60px 0'><a href='MonAn/$item->MaMon'><button class='btn btn-info'>Chi tiết</button></a></td>
                </tr>
            ";
        }

        return $str;
    }

    // ajax tìm kiếm món ăn
    public function search_monan(Request $request)
    {
        $queryString = $request->queryString;
        $search = MonAn::where('TenMon', 'LIKE', "%$queryString%")->get();
        $output = "<div class='list-group'>";
        foreach($search as $row)
        {
            $output .= "<a href='MonAn/$row->MaMon' class='list-group-item list-group-item-action'>$row->TenMon</a>";
        }
        $output .= '</div>';
        echo $output;
    }

    //======================================= DANH MỤC ======================================================

    public function danhmuc()
    {
        $dsDanhMuc = DanhMuc::all();
        return view('danhmuc', ['dsDanhMuc'=>$dsDanhMuc]);
    }

    public function create_danhmuc()
    {
        return view('create_danhmuc');
    }

    public function show_DanhMuc($id)
    {
        $chitiet_danhmuc = DanhMuc::where('MaLoai', '=', $id)->get();
        
        return view('chitiet_danhmuc', ['chitiet_danhmuc'=>$chitiet_danhmuc]);
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

    //xoa danh muc
    public function destroy_DanhMuc($id)
    {
        DB::table('DanhMuc')->where('MaLoai',$id)->update(['TrangThai'=>0]);

        $dsDanhMuc = DB::table('DanhMuc')->get();
        return redirect()->route('CTNA.danhmuc',['dsDanhMuc'=>$dsDanhMuc]);
    }

    //tim kiem danh muc
    public function TimKiem(Request $request)
    {
        $dsDanhMuc=DanhMuc::where('TenLoai','like','%'.$request->key.'%')
        ->where('TrangThai',1)->get();
        return view('search',compact('dsDanhMuc'));
    }

    //======================================= CÔNG THỨC ĐANG CHỜ ======================================================
    //Lấy dữ liệu bảng món ăn
    public function duyet()
    {
        $dsDuyetCongThuc = MonAn::where('TrangThai', 2)->get();
        return view('duyetcongthuc',['dsDuyetCongThuc'=>$dsDuyetCongThuc]);
    }

    //Lấy dữ liệu bảng bình luận
    public function binhluan()
    {
        $dsBinhLuan = BinhLuan::all();
        return view('binhluan', ['dsBinhLuan'=>$dsBinhLuan]);
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

    //======================================= BÌNH LUẬN ======================================================
    
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

    //======================================= TÀI KHOẢN ======================================================

    // index tài khoản
    public function taikhoan()
    {
        $dsTaiKhoan = TaiKhoan::paginate(4);

        return view('TaiKhoan', ['dsTaiKhoan'=>$dsTaiKhoan]);
    }

    // store tài khoản
    public function create_taikhoan()
    {
        return view('create_taikhoan');
    }

    // xử lý thêm
    public function store_TaiKhoan(Request $request)
    {
        //Validation
        $request->validate([
            'HoTen'     => 'max:50',
            'SDT'       => 'digits:10',
            'Email'     => 'max:100',
            'Username'  => 'max:255',
            'Password'  => 'max:255',
            'inp_Avatar'=> 'mimes:jpg,jpeg,png,gif|max:2048'
        ],
        [
            'HoTen.max'         => 'Họ tên không được có hơn 50 ký tự',
            'SDT.digits'        => 'Số điện thoại phải là chữ số với 10 ký tự',
            'Email.max'         => 'Email không được có hơn 100 ký tự',
            'Username.max'      => 'Tài khoản không được có hơn 255 ký tự',
            'Password.max'      => 'Mật khẩu không được có hơn 255 ký tự',
            'inp_Avatar.mimes'  => 'Tệp ảnh phải có đuôi là .jpg .jpeg .png .gif',
            'inp_Avatar.max'    => 'Tệp ảnh không được lớn hơn 2048 kilobytes'
        ]);

        //lấy giá trị
        $Username   = $request->Username;
        $LoaiTK     = 'User';
        $TrangThai  = 1;

        // Xử lý file
        if($request->hasFile('inp_Avatar')){
            // lấy ra
            $file       = $request->inp_Avatar;
            $extension  = $file->extension();
            $path       = 'images/Avatar/';
            $AnhDaiDien = $Username.'.'.$extension;
            // lưu file
            $file->move($path,$AnhDaiDien);
        }

        //insert vào bảng tài khoản
        $Insert_taikhoan = DB::table('taikhoan')->insert([
            'Username'  => $Username,
            'AnhDaiDien'=> $AnhDaiDien,
            'Password'  => bcrypt($request->Password),
            'HoTen'     => $request->HoTen,
            'SDT'       => $request->SDT,
            'Email'     => $request->Email,
            'LoaiTK'    => $LoaiTK,
            'TrangThai' => $TrangThai
        ]);

        //chuyển về trang chi tiết
        return redirect()->route('CTNA.show_taikhoan', ['id'=>$Username])->with('thong_diep', 'Thêm tài khoản thành công');
    }

    //detail tài khoản
    public function show_TaiKhoan($id)
    {
        $chitiet_taikhoan   = TaiKhoan::where('Username', '=', $id)->get();
        $mondatao_taikhoan  = MonAn::where('NguoiTao', '=', $id)->get();
        $mondathich_taikhoan= MonAnDaThich::where('Username', '=', $id)->get();
        
        return view('chitiet_taikhoan', ['chitiet_taikhoan'=>$chitiet_taikhoan,'mondatao_taikhoan'=>$mondatao_taikhoan,'mondathich_taikhoan'=>$mondathich_taikhoan]);
    }

    // xử lý cập nhật
    public function update_taikhoan(Request $request, $id)
    {   
        //Validation
        $request->validate([
            'MatKhau'   => 'max:255',
            'HoTen'     => 'max:50',
            'SDT'       => 'digits:10',
            'Email'     => 'max:100',
            'inp_Avatar'=> 'mimes:jpg,jpeg,png,gif|max:2048'
        ],
        [
            'MatKhau.max'       => 'Mật khẩu không được có hơn 255 ký tự',
            'HoTen.max'         => 'Họ tên không được có hơn 50 ký tự',
            'SDT.digits'        => 'Số điện thoại phải là chữ số với 10 ký tự',
            'Email.max'         => 'Email không được có hơn 100 ký tự',
            'inp_Avatar.mimes'  => 'Tệp ảnh phải có đuôi là .jpg .jpeg .png .gif',
            'inp_Avatar.max'    => 'Tệp ảnh không được lớn hơn 2048 kilobytes'
        ]);

        //lấy giá trị từ request
        $Username   = $request->TaiKhoan;
        // Kiểm tra file
        if($request->hasFile('inp_Avatar'))
        {   
            //Xử lý file
            $file        = $request->file('inp_Avatar');
            $extension   = $file->extension();
            $path        = 'images/Avatar/';
            $AnhDaiDien  = $Username.'.'.$extension;
            $file->move($path,$AnhDaiDien);
            
            //kiểm tra password
            if($request->MatKhau == ""){
                DB::table('taikhoan')->where('Username',$id)->update([
                    'AnhDaiDien'    => $AnhDaiDien,
                    'HoTen'         => $request->HoTen,
                    'SDT'           => $request->SDT,
                    'Email'         => $request->Email
            ]);}
            else{
                DB::table('taikhoan')->where('Username',$id)->update([
                    'AnhDaiDien'    => $AnhDaiDien,
                    'Password'      => bcrypt($request->MatKhau),
                    'HoTen'         => $request->HoTen,
                    'SDT'           => $request->SDT,
                    'Email'         => $request->Email
            ]);}
        }else {
            //kiểm tra password
            if($request->MatKhau == ""){
                DB::table('taikhoan')->where('Username',$id)->update([
                    'HoTen'         => $request->HoTen,
                    'SDT'           => $request->SDT,
                    'Email'         => $request->Email
            ]);}
            else{
                DB::table('taikhoan')->where('Username',$id)->update([
                    'Password'      => bcrypt($request->MatKhau),
                    'HoTen'         => $request->HoTen,
                    'SDT'           => $request->SDT,
                    'Email'         => $request->Email
            ]);}
        }

        //gửi thêm session
        return redirect()->route('CTNA.show_taikhoan', ['id'=>$id])->with('thong_diep', 'Cập nhật tài khoản thành công');
    }

    // xử lý khoá
    public function lockout_taikhoan($id)
    {
        //cập nhật trạng thái = 0
        DB::table('TaiKhoan')->where('Username',$id)->update(['TrangThai'=>0]);

        return response()->json(['success'=>'Khoá rồi','error'=>'lỗi rồi']);
    }

    // xử lý mở khoá
    public function open_taikhoan($id)
    {   
        //cập nhật trạng thái = 1
        DB::table('TaiKhoan')->where('Username',$id)->update(['TrangThai'=>1]);

        return response()->json(['success'=>'Đã mở lạy','error'=>'lỗi rồi']);
    }

    // xử lý tìm kiếm
    public function search_taikhoan(Request $request)
    {
        if($request->get('query'))
        {
            $query  = $request->get('query');
            $data   = taikhoan::where('username', 'LIKE', "%{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display:block">';
            foreach($data as $row)
            {
                $output .= '<li class="list-group-item">
                <a  href="taikhoan/'. $row->username.'">TÀI KHOẢN: '.$row->username.' [ SDT: '.$row->SDT.' ]
                </li>';
            }
            $output .= '</ul>';
           echo $output;
       }
    }

}
