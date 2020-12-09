@extends('layout')

@section('content')
<a href="{{route('CTNA.danhmuc')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>
<form action="#" method='POST'>
    @csrf
    <div class='form-create'>
        <div class='form-group'>
            <label for="LoaiMon">Loại món</label>
            <input type="text" class='form-control' name='LoaiMon'>
        </div>
        <button type='submit' class='btn btn-primary'>Thêm</button>
    </div>
</form>
@endsection
