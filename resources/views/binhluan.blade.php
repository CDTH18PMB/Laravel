@extends('layout')

@section('active_binhluan')class="active has-sub"@endsection

@section('content')
<div class='form-create'>
    <table class='table'>
        <thead class='thead-dark'>
            <tr class='size-14'>
                <th>Mã món</th>
                <th>Tên món</th>
                <th>Username</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            <tr style='text-align:center'>
                <td>{{$data}}</td>
                <td>{{$data}}</td>
                <td>{{$data}}</td>
                <td style='width:500px'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus laborum deserunt fugiat cum mollitia reprehenderit voluptatem fuga omnis </td>
                <td>{{$data}}</td>
                <td>
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