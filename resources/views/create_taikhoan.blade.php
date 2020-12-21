@extends('layout')

@section('url')../@endsection

@section('active_taikhoan')class="active has-sub"@endsection

@section('content')
<a href="{{route('CTNA.taikhoan')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>
<form action="{{route('CTNA.store_taikhoan')}}" method='POST' enctype="multipart/form-data">
    @csrf
    <div class='form-create'>
        <div class='row'>
            <div class='col-sm-8'>
                <h4 style='font-style: italic;'>Thông tin cá nhân</h4>
                <div style='border-top: 1px solid gray; width:100%; margin-bottom:25px'></div>
                <div class='form-group'>
                    <label for="HoTen">Họ tên</label>
                    <input type="text" class='form-control @error('HoTen') is-invalid @enderror' name='HoTen' required>
                    @error('HoTen')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group'>
                    <label for="SDT">SĐT</label>
                    <input type="number" class='form-control @error('SDT') is-invalid @enderror' name='SDT'required>
                    @error('SDT')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group'>
                    <label for="Email">Email</label>
                    <input type="email" class='form-control @error('Email') is-invalid @enderror' name='Email' required>
                    @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <h4 style='font-style: italic;'>Thông tin Tài khoản</h4>
                <div style='border-top: 1px solid gray; width:100%; margin-bottom:25px'></div>

                <div class='form-group'>
                    <label for="Username">Tài khoản</label>
                    <input type="text" class='form-control @error('Username') is-invalid @enderror' name='Username' required>
                    @error('Username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group'>
                    <label for="Password">Mật khẩu</label>
                    <input type="password" class='form-control @error('Password') is-invalid @enderror' name='Password' required>
                    @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <h4 style='font-style: italic;'>Ảnh đại diện</h4>
                    <div style='border-top: 1px solid gray; width:100%; margin-bottom:25px'></div>
                    <img class='card-img-top' src="images/No-image-2.jpg" alt="AnhDaiDien" id='img_Avatar' name='img_Avatar' 
                    style='width: 100%; height: 260px'>
                    <span class='btn-file btn btn-outline-dark'>
                    <input type="file" class='@error('inp_Avatar') is-invalid @enderror' id='inp_Avatar'name='inp_Avatar' required>Chọn hình</span>
                    @error('inp_Avatar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>           
            </div>
        </div> 
        <div style='border-top: 1px solid gray; width:100%; margin: 25px 0 25px 0'></div>
        <button type='submit' class='btn btn-primary' style='width: 100%'>Thêm</button>
    </div>
</form>
@endsection
