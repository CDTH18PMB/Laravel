@extends('layout')

@section('active_taikhoan')class="active has-sub"@endsection

@section('content')
<div style='margin: 0 0 10px 20px'>
    <a href="{{route('CTNA.create_taikhoan')}}"><button class='btn btn-primary'>Thêm</button></a>
</div>
<div class='form-create'>
    <table class='table'>
        <thead class='thead-dark'>
            <tr class='size-14'>
                <th>Tài khoản</th>
                <th>Ảnh đại diện</th>
                <th>Mật khẩu</th>
                <th>Họ tên</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Loại</th>
                <th>Trạng thái</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsTaiKhoan as $ds)
            <tr style='text-align:center'>
                <td style='padding:50px 0'>{{$ds->username}}</td>
                <td><img src="images/icon/avatar-big-01.jpg" alt="avatar" width='100px' height='100px'></td>
                <td style='padding:50px 0'>********</td>
                <td style='padding:50px 0'>{{$ds->HoTen}}</td>
                <td style='padding:50px 0'>{{$ds->SDT}}</td>
                <td style='padding:50px 0'>{{$ds->Email}}</td>
                <td style='padding:50px 0'>{{$ds->LoaiTK}}</td>
                <td style='padding:50px 0'>{{$ds->TrangThai}}</td>
                <td style='padding:40px 0'><a href="{{route('CTNA.show_taikhoan', ['id'=>$ds->username])}}"><button class='btn btn-info'>Chi tiết</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection