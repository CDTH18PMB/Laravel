@extends('layout')

@section('active_binhluan')class="active has-sub"@endsection

@section('content')
<div  id="notify_comment" ></div>
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
        <tbody style='text-align:center'>
            <tr>
            @foreach($dsBinhLuan as $binhluan)
                <td>{{$binhluan->MaMon}}</td>
                <td>{{$binhluan->TenMon}}</td>
                <td>{{$binhluan->Username}}</td>
                <td>{{$binhluan->NoiDung}} </td>
                <td>{{$binhluan->TrangThai}}</td>
                <td>
                @if($binhluan->TrangThai == 0 )
                    <div style='margin-bottom:3px'>
                    <input type="button" data-TrangThai="0" id="{{$binhluan->MaMon}}"  class="btn btn-primary  binhluan_duyet_btn" value="Duyệt" >

                        <!-- <a href="#" class='link_duyet'>Duyệt</a> -->
                    </div>
                    @else 
                    <div>
                        <!-- <a href="#" class='link_duyet'>Xóa</a> -->
                    <input type="button" data-TrangThai="1" id="{{$binhluan->MaMon}}"  class="btn btn-danger binhluan_xoa_btn" value="Xoá" >
                    </div> 
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection