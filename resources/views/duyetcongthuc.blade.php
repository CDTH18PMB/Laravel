@extends('layout')

@section('active_duyet')class="active has-sub"@endsection

@section('content')
<div class='form-create'>
    <table class='table'>
        <thead class='thead-dark'>
            <tr class='size-14'>
                <th>Người tạo</th>
                <th>Tên món</th>
                <th>Ảnh đại diện</th>
                <th>Độ khó</th>
                <th>Thời gian nấu</th>
                <th>Loại món</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            <tr style='text-align:center'>
                <td style='padding:70px 0'>{{$data}}</td>
                <td style='padding:70px 0'>{{$data}}</td>
                <td><img src="images/bg-title-01.jpg" alt="image" width='200px' height='200px'></td>
                <td style='padding:70px 0'>{{$data}}</td>
                <td style='padding:70px 0'>{{$data}}</td>
                <td style='padding:70px 0'>{{$data}}</td>
                <td >
                    <div style='margin-bottom:3px'>
                        <a href="{{route('CTNA.show_MonAn', ['id'=>2])}}" class='link_duyet'>Chi tiết</a>
                    </div>
                    <div style='margin-bottom:3px'>
                        <a href="#" class='link_duyet'>Duyệt</a>
                    </div>
                    <div>
                        <a href="#" class='link_duyet'>Xóa</a>
                    </div> 
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection