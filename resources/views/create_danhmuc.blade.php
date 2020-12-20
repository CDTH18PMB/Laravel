@extends('layout')

@section('content')
<a href="{{route('CTNA.danhmuc')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>
<form action="{{route('CTNA.store_danhmuc')}}" method='POST'>
    @csrf
    <div class='form-create'>
    <div class='form-group'>
            <label for="LoaiMon">Tên Loại</label>
            <input type="text" class='form-control' name='TenLoai'>
        </div>
        <div class='form-group'>
            <label for="LoaiMon">Trạng Thái</label>
            <input type="text" class='form-control' name='TrangThai'>
        </div>
        <button type='submit' class='btn btn-primary'>Thêm</button>
    </div>
</form>
@endsection
