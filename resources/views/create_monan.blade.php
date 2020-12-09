@extends('layout')

@section('active_index')class="active has-sub"@endsection
@section('url')../@endsection

@section('content')
<a href="{{route('CTNA.index')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>
<form action="{{route('CTNA.store_monan',['steps'=>$steps])}}" method='POST'>
    @csrf
    <div class='form-create'>
        <div class='row'>
            <div class='col-sm-8'>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="TenMon">Tên món</label>
                            <input type="text" class='form-control' name='TenMon'>
                        </div>
                    </div>
                    <div class='col-sm-6'>
                    <div class='form-group'>
                            <label for="DoKho">Độ khó</label>
                            <input type="text" class='form-control' name='DoKho'>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="ThoiGianNau">Thời gian nấu</label>
                            <input type="text" class='form-control' name='ThoiGianNau'>
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
                            <textarea name="MoTa" rows="4" class='form-control'></textarea>
                        </div>
                    </div>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="NguyenLieu">Nguyên liệu</label>
                            <textarea name="NguyenLieu" rows="4" class='form-control'></textarea>
                        </div>
                    </div>
                </div>       
            </div>
            <div class='col-sm-4'>                                
                <div class='form-group'>
                    <label for="img_Create_MonAn">Ảnh đại diện</label>
                    <img src="../images/bg-title-01.jpg" alt="Ảnh đại diện" id='img_Create_MonAn' name='img_Create_MonAn' style='width: 100%; height: 250px'>
                    <span class='btn btn-outline-dark btn-file'>
                        <input type="file" class='form-control' name='inp_Create_MonAn' id='inp_Create_MonAn'>Chọn hình
                    </span>
                </div>                    
            </div>
        </div>

        <h4>Các bước thực hiện</h4>
        <div class='hr'></div>

        @for($i = 1; $i <= $steps; $i++)
            <div class='row' style='margin-bottom:25px'>
                <div class='col-sm-4'>
                    <img src="../images/No-image.jpg" alt="hình ảnh" id='img_Buoc_{{$i}}' style='width: 100%; height: 240px'>
                    <span class='btn btn-outline-dark btn-file'>Đổi hình<input type='file' id="inp_Buoc_{{$i}}"></span>
                </div>
                <div class='col-sm-8'>
                    <textarea name='Buoc_{{$i}}' cols="30" rows="11" class='form-control'></textarea>
                </div>
            </div>  
        @endfor 
        <a href="{{route('CTNA.addStep', ['steps'=>$steps+1])}}"><button type='button' class='btn btn-primary'>Thêm bước</button></a>
        <div class='hr'></div>
        <button type='submit' class='btn btn-primary' style='width: 100%'>Thêm</button>
    </div>
</form>
@endsection