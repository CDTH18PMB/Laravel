@extends('layout')

@section('active_taikhoan')class="active has-sub"@endsection
@section('url')../@endsection

@section('content')
<a href="{{route('CTNA.taikhoan')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>
@foreach($chitiet_taikhoan as $chitiet)
<!--nút Trại thái-->
@if ($chitiet->TrangThai == 1)
        <button data-url="{{route('CTNA.lockout_taikhoan',['id'=>$chitiet->username])}}" id="lockout_taikhoan" 
            class='btn btn-danger' style='margin:0 0 15px 5px'>Khóa tài khoản</button>
        {{-- ẩn mở --}}
        <button data-url="{{route('CTNA.open_taikhoan',['id'=>$chitiet->username])}}" id="open_taikhoan" 
            class='btn btn-info' style='display: none;margin:0 0 15px 5px'> Mởi tài khoản</button>
@else
        <button data-url="{{route('CTNA.open_taikhoan',['id'=>$chitiet->username])}}" id="open_taikhoan" 
            class='btn btn-info' style='margin:0 0 15px 5px'> Mởi tài khoản</button>
        {{-- ẩn khoá --}}
        <button data-url="{{route('CTNA.lockout_taikhoan',['id'=>$chitiet->username])}}" id="lockout_taikhoan" 
            class='btn btn-danger' style='display: none;margin:0 0 15px 5px'>Khóa tài khoản</button>
@endif
<!--cập nhật-->
<div class='form-create' >
    <form action={{route('CTNA.update_taikhoan',['id'=>$chitiet->username])}} method='POST' enctype="multipart/form-data">
        @csrf
        {{-- trạng thái --}}
        <div class="row">
            <h4 style='font-style: italic;'>Thông tin tài khoản</h4>
            @if ($chitiet->TrangThai == 1)
            <h4 style='font-style: italic; color:aquamarine' id="txt_danghoatdong">: Đang hoạt động</h4>
            {{-- ẩn đã khoá --}}
            <h4 style='display: none;font-style: italic; color:  hotpink' id="txt_dakhoa">: Đã khoá</h4>
            @else
            <h4 style='font-style: italic; color: hotpink' id="txt_dakhoa">: Đã khoá</h4>
            {{-- ẩn đang hoạt động --}}
            <h4 style='display: none;font-style: italic; color:aquamarine' id="txt_danghoatdong">: Đang hoạt động</h4>
            @endif
        </div>
        <div class='hr'></div>
        <!--thông báo từ session-->
        @if (session('thong_diep'))
        <div class="alert alert-success">
            {{ session('thong_diep') }}
        </div>
        @endif
        <div class='row'>
            <div class='col-sm-8'>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="TaiKhoan">Tài khoản</label>
                            <input type="text" class='form-control' name='TaiKhoan' value='{{$chitiet->username}}' readonly>
                        </div>                   
                    </div>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="MatKhau">Mật khẩu</label>
                            <input type="password" class='form-control @error('MatKhau') is-invalid @enderror' name='MatKhau' placeholder='********' >
                            @error('MatKhau')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label for="HoTen">Họ tên</label>
                    <input type="text" class='form-control @error('HoTen') is-invalid @enderror' name='HoTen' value='{{$chitiet->HoTen}}' required>
                    @error('HoTen')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group'>
                    <label for="SDT">Số Điện Thoại</label>
                    <input type="number" class='form-control @error('SDT') is-invalid @enderror' name='SDT' value='{{$chitiet->SDT}}' required>
                    @error('SDT')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group'>
                    <label for="Email">Email</label>
                    <input type="email" class='form-control @error('Email') is-invalid @enderror' name='Email' value='{{$chitiet->Email}}' required>
                    @error('Email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="img_Avatar">Ảnh đại diện</label>
                    <img src="../images/avatar/{{$chitiet->AnhDaiDien}}" alt="AnhDaiDien" name='img_Avatar' id='img_Avatar' 
                    style='width: 100%; height: 260px'>
                    <span class='btn-file btn btn-outline-dark'>
                    <input type="file" class='@error('inp_Avatar') is-invalid @enderror' name="inp_Avatar" id='inp_Avatar' >Chọn hình</span>
                    @error('inp_Avatar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        @if ($chitiet->TrangThai == 1) <button class='btn btn-primary' id="btn_hoatdong" style='width:100%'>Cập nhật</button>
        <button class='btn btn-secondary' disabled data-bs-toggle="button" id="btn_dakhoa" style='display: none;width:100%'>Cập nhật</button>
        @else <button class='btn btn-primary' id="btn_hoatdong" style='display: none;width:100%'>Cập nhật</button>
        <button class='btn btn-secondary' disabled data-bs-toggle="button" id="btn_dakhoa" style='width:100%'>Cập nhật</button>
        @endif
    </form>
    @endforeach
{{-- hiện danh sách món đã tạo, đã thích --}}
</div> 
    <button style='margin:20px 0px 10px 20px' id="mondatao" class='btn btn-info'>Món ăn đã tạo</button>
    <button style='margin:20px 0px 10px 0px' id="mondathich" class='btn btn-info'>Món ăn đã thích</button>
<div class='form-create'> 
<!--Món ăn đã tạo-->
<form id="formmondatao" >
    <h4 style='font-style: italic;'>Món ăn đã tạo</h4>
    <div class='hr'></div>
    <div class='form-group'>
        <table class='table'>
            <thead class='thead-dark' style='text-align: center'>
                <tr>
                    <th>Mã món</th>
                    <th>Tên món</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mondatao_taikhoan as $chitiet)
                <tr style='text-align: center'>
                    <td style='padding:10px 0'>{{$chitiet->MaMon}}</td>
                    <td style='padding:10px 0'>{{$chitiet->TenMon}}</td>
                    <td style='padding:10px 0'><a href="{{route('CTNA.show_monan',['id'=>$chitiet->MaMon])}}">
                        <button type='button' class='btn btn-info'>Chi tiết</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>
<!--Món ăn đã thích-->
<form id="formmondathich" style="display: none;">
    <h4 style='font-style: italic;'>Món ăn đã thích</h4>
    <div class='hr'></div>
    <div class='form-group'>
        <table class='table'>
            <thead class='thead-dark' style='text-align: center'>
                <tr>
                    <th>Mã món</th>
                    <th>Tên món</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mondathich_taikhoan as $chitiet)
                <tr style='text-align: center'>
                    <td style='padding:10px 0'>{{$chitiet->MaMon}}</td>
                    <td style='padding:10px 0'>{{$chitiet->TenMon}}</td>
                    <td style='padding:10px 0'><a href="{{route('CTNA.show_monan',['id'=>$chitiet->MaMon])}}">
                        <button type='button' class='btn btn-info'>Chi tiết</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form> 
</div>
{{-- script --}}
<script src="{{ URL::asset('vendor/jquery-3.2.1.min.js') }}"></script>
<script>
$(document).ready(function(){
// món đã tạo
$("#mondatao").click(function(){
    $("#formmondatao").show();
    $("#formmondathich").hide();
  });
// món đã thích
$("#mondathich").click(function(){
    $("#formmondatao").hide();
    $("#formmondathich").show();
  });
});
 // khoá tài khoản
 $("#lockout_taikhoan").click(function(e){
    e.preventDefault();
    var _token = $('input[name="_token"]').val();
    var url = $(this).attr('data-url');
    if(confirm("Bạn có muốn khoá không?")){  
        $.ajax({
            type: 'get',
            url: url,
            success:function(response){
                $("#lockout_taikhoan").hide();
                $("#txt_danghoatdong").hide();
                $("#open_taikhoan").show();
                $("#txt_dakhoa").show();
                $("#btn_hoatdong").hide();
                $("#btn_dakhoa").show();
            },
            error: function(response){
                alert(response.error);
            }
        });
    }else{  return false;}
});
// mở tài khoản
$("#open_taikhoan").click(function(e){
    e.preventDefault();
    var _token = $('input[name="_token"]').val();
    var url = $(this).attr('data-url');

    if(confirm("Bạn có muốn mở tài khoản không?")){  
        $.ajax({
            type: 'get',
            url: url,
            success:function(response){
                $("#open_taikhoan").hide();
                $("#txt_dakhoa").hide();
                $("#lockout_taikhoan").show();
                $("#txt_danghoatdong").show();
                $("#btn_dakhoa").hide();
                $("#btn_hoatdong").show();
            },
            error: function(response){
                alert(response.error);
            }
        });
    }else{  return false;}
});

</script>
@endsection