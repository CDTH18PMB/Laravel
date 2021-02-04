@extends('layout')

@section('active_taikhoan')class="active has-sub"@endsection

@section('content')
<div class='row'>
    <div class="col-sm-6">
        <div style='margin: 0 0 10px 20px'>
            <a href="{{route('CTNA.create_taikhoan')}}"><button class='btn btn-primary'>Thêm</button></a>
        </div>
    </div>
    <div class="col-sm-6">
        <div class='form-group' style='margin: 0 20px 0px 0px'>
                <input type="search" id="search_username" class='form-control' placeholder='Nhập tài khoản để tìm'>
                <div id="list_username"></div>
        </div>
        {{ csrf_field() }}
    </div>
</div>
<div class='form-create'>
    <table class='table'>
        <thead class='thead-dark'>
            <tr class='size-14'>
                <th style='text-align:center'>Tài khoản</th>
                <th style='text-align:center'>Ảnh đại diện</th>
                <th style='text-align:center'>Họ tên</th>
                <th style='text-align:center'>SĐT</th>
                <th style='text-align:center'>Email</th>
                <th style='text-align:center'>Loại</th>
                <th style='text-align:center'>Trạng thái</th>
                <th style='text-align:center'>Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsTaiKhoan as $ds)
            <tr style='text-align:center'>
                <td style='padding:50px 0'>{{$ds->username}}</td>
                <td><img src="images/avatar/{{$ds->AnhDaiDien}}"  alt="avatar" style='width:100px; height:100px'></td>
                <td style='padding:50px 0'>{{$ds->HoTen}}</td>
                <td style='padding:50px 0'>{{$ds->SDT}}</td>
                <td style='padding:50px 0'>{{$ds->Email}}</td>
                <td style='padding:50px 0'>{{$ds->LoaiTK}}</td>
                <td style='padding:50px 0'>@if($ds->TrangThai==1) <p style="color: aquamarine">hoạt Động</p>  
                                            @else <p style="color: hotpink">đã Khoá</p>@endif</td>
                <td style='padding:40px 0'><a href="{{route('CTNA.show_taikhoan', ['id'=>$ds->username])}}">
                    <button class='btn btn-info'>Chi tiết</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class='col-12 d-flex justify-content-center' style='margin-top:20px'>
{{$dsTaiKhoan->links()}}
</div>

<script src="{{ URL::asset('vendor/jquery-3.2.1.min.js') }}"></script>
<script>
$(document).ready(function(){
    $("#search_username").keyup(function(){
        var query = $(this).val();
        // if(query != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('CTNA.search_taikhoan') }}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                    $('#list_username').fadeIn();  
                    $('#list_username').html(data);
                }
            });
        // }
    });
});
// $(document).on('click', 'li', function(){  
//     $('#search_username').val($(this).text());  
//     $('#list_username').fadeOut();  
//   });
</script>
@endsection