@extends('layout')

@section('active_index')class="active has-sub"@endsection
@section('url')../@endsection

@section('content')
<a href="{{route('CTNA.index')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>


@foreach($chitiet_monan as $chitiet)
<a href="{{route('CTNA.destroy_monan', ['id'=>$chitiet->MaMon])}}"><button class='btn btn-danger' style='margin:0 0 15px 5px'>Xóa</button></a>


<form method='POST' action="{{route('CTNA.update_monan',['id'=>$chitiet->MaMon])}}">
    @csrf
    <div class='form-create'>
        <div class='row'>
            <div class='col-sm-8'>
                <div class='row'>
                    <div class='col-sm-4'>
                        <div class='form-group'>
                            <label for="MaMon">Mã món</label>
                            <input type="text" class='form-control' name='MaMon' value='{{$chitiet->MaMon}}' disabled>
                        </div>
                    </div>                                
                    <div class='col-sm-4'>
                        <div class='form-group'>
                            <label for="TenMon">Tên món</label>
                            <input type="text" class='form-control' name='TenMon' value='{{$chitiet->TenMon}}'>
                        </div>
                    </div>
                    <div class='col-sm-4'>
                        <div class='form-group'>
                            <label for="NguoiTao">Người tạo</label>
                            <input type="text" class='form-control' name='NguoiTao' value='{{$chitiet->NguoiTao}}'>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="DoKho">Độ khó</label>
                            <input type="text" class='form-control' name='DoKho' value='{{$chitiet->DoKho}}'>
                        </div>
                    </div>                                
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="ThoiGianNau">Thời gian nấu</label>
                            <input type="text" class='form-control' name='ThoiGianNau' value='{{$chitiet->ThoiGianNau}}'>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="LuotXem">Lượt xem</label>
                            <input type="text" class='form-control' name='LuotXem' value='{{$chitiet->LuotXem}}'>
                        </div>
                    </div>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="LuotThich">Lượt thích</label>
                            <input type="text" class='form-control' name='LuotThich' value='{{$chitiet->LuotThich}}'>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="LoaiMon">Loại món</label>
                            <select name="LoaiMon" class='form-control'>
                            
                                <option value="{{$loaimon}}">{{$tenloai}}</option>

                                @foreach($dsDanhMuc as $key)
                                <option value="{{$key->MaLoai}}">{{$key->TenLoai}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="AnhDaiDien">Ảnh đại diện</label>
                    <img src="../../images/{{$chitiet->TenMon}}/anhdaidien.jpg" alt="image" id='img_MonAn' style='width: 100%; height: 250px'>
                    <span class='btn btn-outline-dark btn-file'><input type="file" id='inp_MonAn' class='form-control' name='AnhDaiDien'>Chọn hình</span>
                </div>
            </div>
        </div>

        <div class='row'>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label for="MoTa">Mô tả</label>
                    <textarea name="MoTa" cols="30" rows="5" class='form-control'>{{$chitiet->MoTa}}</textarea>
                </div>
            </div>                                
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label for="NguyenLieu">Nguyên liệu</label>
                    <textarea name="NguyenLieu" cols="30" rows="5" class='form-control'>{{$chitiet->NguyenLieu}}</textarea>
                </div>
            </div>
        </div>

        <p>Các bước thực hiện</p>
        <div class='hr'></div>
        @foreach($dsHuongDan as $step)
        <div class='row' style='margin-bottom:25px'>
            <div class='col-sm-4'>
                <img src="../images/{{$chitiet->TenMon}}/{{$step->HinhAnh}}" alt="hình ảnh" id='image' style='width: 100%; height: 240px'>
                <span class='btn btn-outline-dark btn-file'>Đổi hình<input type='file' id="inputIMG"></span>
            </div>
            <div class='col-sm-8'>
                <textarea name="HuongDan" cols="30" rows="11" class='form-control'>{{$step->CacBuocLam}}</textarea>
            </div> 
        </div>
        @endforeach
        
        <div class='hr'></div>
        <button class='btn btn-primary' style='width:100%'>Cập nhật</button>
        @endforeach
    </div>
</form>
@endsection