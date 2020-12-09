@extends('layout')

@section('active_taikhoan')class="active has-sub"@endsection
@section('url')../@endsection

@section('content')

<a href="{{route('CTNA.taikhoan')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>
<a href="#"><button class='btn btn-danger' style='margin:0 0 15px 5px'>Khóa tài khoản</button></a>

<div class='form-create'>
    <form action=# method='POST'>
        @csrf
        <h4 style='font-style: italic;'>Thông tin tài khoản</h4>
        <div class='hr'></div>
        @foreach($chitiet_taikhoan as $chitiet)
        <div class='row'>
            <div class='col-sm-8'>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="TaiKhoan">Tài khoản</label>
                            <input type="text" class='form-control' name='TaiKhoan' value='{{$chitiet->username}}'>
                        </div>                   
                    </div>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="MatKhau">Mật khẩu</label>
                            <input type="text" class='form-control' name='MatKhau' value='{{$chitiet->password}}'>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label for="HoTen">Họ tên</label>
                    <input type="text" class='form-control' name='HoTen' value='{{$chitiet->HoTen}}'>
                </div>
                <div class='form-group'>
                    <label for="SDT">SĐT</label>
                    <input type="text" class='form-control' name='SDT' value='{{$chitiet->SDT}}'>
                </div>
                <div class='form-group'>
                    <label for="Email">Email</label>
                    <input type="text" class='form-control' name='Email' value='{{$chitiet->Email}}'>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="img_Avatar">Ảnh đại diện</label>
                    <img src="../images/bg-title-01.jpg" alt="AnhDaiDien" name='img_Avatar' id='img_Avatar' style='width: 100%; height: 260px'>
                    <span class='btn-file btn btn-outline-dark'><input type="file" id='inp_Avatar'>Chọn hình</span>
                </div>
            </div>
        </div>
        @endforeach
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
                    <tr style='text-align: center'>
                        <td>data</td>
                        <td>data</td>
                        <td><a href="{{route('CTNA.show_monan',['id'=>1])}}"><button type='button' class='btn btn-info'>Chi tiết</button></a></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

        <div class='hr'></div>
        <button class='btn btn-primary' style='width:100%'>Cập nhật</button>
    </form>
</div>
@endsection