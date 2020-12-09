@extends('layout')

@section('url')../@endsection

@section('active_taikhoan')class="active has-sub"@endsection

@section('content')
<a href="{{route('CTNA.taikhoan')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>
<form action="" method='POST'>
    @csrf
    <div class='form-create'>
        <div class='row'>
            <div class='col-sm-8'>
                <h4 style='font-style: italic;'>Thông tin cá nhân</h4>
                <div style='border-top: 1px solid gray; width:100%; margin-bottom:25px'></div>
                <div class='form-group'>
                    <label for="TaiKhoan">Họ tên</label>
                    <input type="text" class='form-control' name='TaiKhoan'>
                </div>
                <div class='form-group'>
                    <label for="TaiKhoan">SĐT</label>
                    <input type="text" class='form-control' name='TaiKhoan'>
                </div>
                <div class='form-group'>
                    <label for="TaiKhoan">Email</label>
                    <input type="text" class='form-control' name='TaiKhoan'>
                </div>

                <h4 style='font-style: italic;'>Thông tin Tài khoản</h4>
                <div style='border-top: 1px solid gray; width:100%; margin-bottom:25px'></div>

                <div class='form-group'>
                    <label for="TaiKhoan">Tài khoản</label>
                    <input type="text" class='form-control' name='TaiKhoan'>
                </div>
                <div class='form-group'>
                    <label for="TaiKhoan">Mật khẩu</label>
                    <input type="text" class='form-control' name='TaiKhoan'>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <h4 style='font-style: italic;'>Ảnh đại diện</h4>
                    <div style='border-top: 1px solid gray; width:100%; margin-bottom:25px'></div>

                    <img class='card-img-top' src="../images/bg-title-01.jpg" alt="AnhDaiDien" id='imgAvatar' width='300px' height='300px'>
                    <span class='btn-file btn btn-outline-dark'><input type="file" id='Avatar'>Chọn hình</span>
                </div>           
            </div>
        </div> 
        <div style='border-top: 1px solid gray; width:100%; margin: 25px 0 25px 0'></div>
        <button type='submit' class='btn btn-primary' style='width: 100%'>Thêm</button>
    </div>
</form>
@endsection
