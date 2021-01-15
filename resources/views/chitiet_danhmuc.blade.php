@extends('layout')

@section('content')
@section('url')../../@endsection
@foreach($chitiet_danhmuc as $chitiet)
<a href="{{route('CTNA.danhmuc')}}"><button class='btn btn-dark' style='margin:0 0 15px 20px'>Quay lại</button></a>
<form method='POST' action="{{route('CTNA.show_update_danhmuc',['id'=>$chitiet->MaLoai])}}"> 
    @csrf
    <div class='form-create'>
        
        <div class='form-group'>
            <label for="LoaiMon">Tên Loại</label>
            <input type="text" class='form-control' name='TenLoai' value ='{{$chitiet->TenLoai}}' > 
        </div>
        
        <button type='submit' class='btn btn-primary'>Sửa</button>
    </div>
</form>
@endforeach
@endsection