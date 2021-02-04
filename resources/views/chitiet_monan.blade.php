@extends('layout')

@section('active_index')class="active has-sub"@endsection
@section('url')../@endsection

@section('content')
<a href="{{route('CTNA.index')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>


@foreach($chitiet_monan as $chitiet)

<!-- Đã xóa -->
@if($chitiet->TrangThai == 0)
<a href="{{route('CTNA.restore', ['id'=>$chitiet->MaMon])}}"><button class='btn btn-success' style='margin:0 0 15px 5px'>Hủy xóa</button></a>
@else
<a href="{{route('CTNA.delete', ['id'=>$chitiet->MaMon])}}"><button class='btn btn-danger' style='margin:0 0 15px 5px'>Xóa</button></a>
@endif

<form method='POST' action="{{route('CTNA.update_monan',['id'=>$chitiet->MaMon])}}" name='CreateProduct' enctype="multipart/form-data">
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
                            <input type="text" class='form-control' name='TenMon' value='{{$chitiet->TenMon}}' required>
                        </div>
                    </div>
                    <div class='col-sm-4'>
                        <div class='form-group'>
                            <label for="NguoiTao">Người tạo</label>
                            <select class='form-control' name="NguoiTao" id="NguoiTao">
                                <option value="{{$chitiet->NguoiTao}}">{{$chitiet->NguoiTao}}</option>
                                @foreach($dsTaiKhoan as $tk)
                                <option value="{{$tk->username}}">{{$tk->username}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="DoKho">Độ khó</label>
                            <select name="DoKho" id="DoKho" class='form-control'>
                                <option value="{{$chitiet->DoKho}}">{{$chitiet->DoKho}}</option>
                                <option value="Dễ">Dễ</option>
                                <option value="Trung bình">Trung bình</option>
                                <option value="Khó">Khó</option>
                            </select>
                        </div>
                    </div>                                
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="ThoiGianNau">Thời gian nấu</label>
                            <input type="text" class='form-control' name='ThoiGianNau' value='{{$chitiet->ThoiGianNau}}' required>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="LuotXem">Lượt xem</label>
                            <input type="number" class='form-control' min='0' name='LuotXem' value='{{$chitiet->LuotXem}}' required>
                        </div>
                    </div>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="LuotThich">Lượt thích</label>
                            <input type="number" class='form-control' min='0' name='LuotThich' value='{{$chitiet->LuotThich}}' required>
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
                        <img src="../images/{{$chitiet->TenMon}}/anhdaidien.jpg" alt="image" id='img_Create_MonAn' name='img_Create_MonAn' style='width: 100%; height: 250px'>
                    <span class='btn btn-outline-dark btn-file'>
                        <input type="file" class='inputfile' data-id='#img_Create_MonAn #inp_Create_MonAn' name='inp_Create_MonAn' id='inp_Create_MonAn' accept='image/*' required>Chọn hình
                    </span>
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

        <p>Các bước thực hiện</p><hr>
        <input name='count' value='{{count($dsHuongDan)}}' hidden>

        
        <div id='HuongDan'>
        @for($i = 1; $i <= count($dsHuongDan); $i++)
            <div id='div_buoc_{{$i}}' class='row' style='margin-bottom:25px'>
                <div class='col-sm-4'>
                    <img src="../images/{{$chitiet->TenMon}}/{{$dsHuongDan[$i-1]->HinhAnh}}" alt="hình ảnh" id='img_Buoc_{{$i}}' style='width: 100%; height: 240px'>
                    <span class='btn btn-outline-dark btn-file'>Đổi hình
                        <input type='file' class='inputfile' data-id='#img_Buoc_{{$i}} #inp_Buoc_{{$i}}' id="inp_Buoc_{{$i}}" name='inp_Buoc_{{$i}}' required>
                    </span>
                </div>
                <div class='col-sm-8'>
                    <textarea id='Buoc_{{$i}}' name='Buoc_{{$i}}' cols="30" rows="11" class='form-control' required>{{$dsHuongDan[$i-1]->CacBuocLam}}</textarea>
                </div> 
            </div>
        @endfor
        </div>

        @if($chitiet->TrangThai == 1)
        <center>
            <button type='button' class='btn btn-warning' id="addStep" style='border-radius:10px; width:40%; margin-top:20px'>Thêm bước</button>
        </center>
        <hr>
        <button type='submit' class='btn btn-primary' style='width:100%'>Cập nhật</button>
        @endif
        @endforeach
    </div>
</form>
@endsection