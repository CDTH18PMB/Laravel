@extends('layout')

@section('active_index')class="active has-sub"@endsection
@section('url')../@endsection

@section('content')
<a href="{{route('CTNA.index')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>
<form action="{{route('CTNA.store_monan')}}" method='POST' name="CreateProduct" enctype="multipart/form-data">
    @csrf
    <div class='form-create'>
        <div class='row'>
            <div class='col-sm-8'>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="TenMon">Tên món</label>
                            <input type="text" class='form-control' name='TenMon' required>
                        </div>
                    </div>
                    <div class='col-sm-6'>
                    <div class='form-group'>
                            <label for="DoKho">Độ khó</label>
                            <select class='form-control' name="DoKho" id="DoKho">
                                <option value="Dễ">Dễ</option>
                                <option value="Trung bình">Trung bình</option>
                                <option value="Dễ">Khó</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="ThoiGianNau">Thời gian nấu</label>
                            <input type="text" class='form-control' name='ThoiGianNau' required>
                        </div>
                    </div>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="LoaiMon">Loại món</label>
                            <select name="LoaiMon" class='form-control'>
                                @foreach($dsDanhMuc as $ds)
                                <option value='{{$ds->MaLoai}}'>{{$ds->TenLoai}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="MoTa">Mô tả</label>
                            <textarea name="MoTa" rows="4" class='form-control' required></textarea>
                        </div>
                    </div>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="NguyenLieu">Nguyên liệu</label>
                            <textarea name="NguyenLieu" rows="4" class='form-control' required></textarea>
                        </div>
                    </div>
                </div>       
            </div>
            <div class='col-sm-4'>                                
                <div class='form-group'>
                    <label for="img_Create_MonAn">Ảnh đại diện</label>
                    <img src="../images/No-image.jpg" alt="Ảnh đại diện" id='img_Create_MonAn' name='img_Create_MonAn' style='width: 100%; height: 250px'>
                    <span class='btn btn-outline-dark btn-file'>
                        <input type="file" class='inputfile' data-id='#img_Create_MonAn #inp_Create_MonAn' name='inp_Create_MonAn' id='inp_Create_MonAn' accept="image/*" required>Chọn hình
                    </span>
                </div>                    
            </div>
        </div>

        <h4>Các bước thực hiện</h4>
        <input type="text" id="count" name="count" value="1" hidden>
        
        <div class='hr'></div>

        <div id="HuongDan">
            <div id='div_buoc_1' class='row' style='margin-bottom:25px'>
                <div class='col-sm-4'>
                    <img src="../images/No-image.jpg" alt="hình ảnh" id='img_Buoc_1' style='width: 100%; height: 240px'>
                    <span class='btn btn-outline-dark btn-file'>Đổi hình<input type='file' class='inputfile' data-id='#img_Buoc_1 #inp_Buoc_1' id="inp_Buoc_1" name='inp_Buoc_1' accept="image/*" required></span>
                </div>
                <div class='col-sm-8'>
                    <textarea id='Buoc_1' name='Buoc_1' cols="30" rows="11" class='form-control' required></textarea>
                </div>
            </div> 
        </div>
        
        <center>
            <button type='button' class='btn btn-warning' id="addStep" style='border-radius:10px; width:40%'>Thêm bước</button>
        </center>

        <div class='hr'></div>
        <button type='submit' class='btn btn-primary' style='width: 100%'>Thêm</button>
    </div>
</form>
@endsection