@extends('layout')

@section('active_danhmuc')class="active has-sub"@endsection

@section('content')
<div style='margin: 0 0 10px 20px'>
   
    
</div>

<div class='form-create'>
    <table class='table'>
        <thead class='thead-dark'>
            <tr style='text-align:center'>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Trang Thai</th>
                <th colspan='2'>Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsDanhMuc as $ds)
            <tr style='text-align:center'>
                <td>{{$ds->MaLoai}}</td>
                <td>{{$ds->TenLoai}}</td>
                <td>{{$ds->TrangThai}}</td>
                <td>
               
                <a href="{{route('CTNA.danhmuc', $ds->id)}}">{{$ds->TenLoai}}</a>
                
                
            @endforeach
        </tbody>
    </table>
</div>

@endsection

