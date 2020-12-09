@extends('layout')

@section('active_index')class="active has-sub"@endsection

@section('content')
<div style='margin: 0 0 10px 20px'>
    <a href="{{route('CTNA.create_monan',['steps'=>1])}}"><button class='btn btn-primary'>Thêm</button></a>
</div>

<div class='form-create'>
    <table class='table'>
        <thead class='thead-dark'>
            <tr class='size-14'>
                <th>Mã món</th>
                <th>Tên món</th>
                <th>Ảnh đại diện</th>
                <th>Độ khó</th>
                <th>Thời gian nấu</th>
                <th>Người tạo</th>
                <th>Trạng thái</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsMonAn as $monan)
            <tr class='size-12'>
                <td style='padding:70px 0'>{{$monan->MaMon}}</td>
                <td style='padding:70px 0'>{{$monan->TenMon}}</td>
                <td><img src="images/{{$monan->TenMon}}/anhdaidien.jpg" alt="image" style='width:250px; height:150px'></td>
                <td style='padding:70px 0'>{{$monan->DoKho}}</td>
                <td style='padding:70px 0'>{{$monan->ThoiGianNau}}</td>
                <td style='padding:70px 0'>{{$monan->NguoiTao}}</td>
                <td style='padding:70px 0'>{{$monan->TrangThai}}</td>
                <td style='padding:60px 0'><a href="{{route('CTNA.show_monan', ['id'=>$monan->MaMon])}}"><button class='btn btn-info'>Chi tiết</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

