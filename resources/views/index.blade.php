@extends('layout')

@section('active_index')class="active has-sub"@endsection

@section('content')

<div style='margin: 0 20px 10px 20px'>
    @if(session('create_success')) <!--thêm món ăn thành công-->
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('create_success')}}</strong>
    </div>
    @endif

    @if(session('update_success')) <!-- cập nhật thành công -->>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('update_success')}}</strong>
    </div>
    @endif

    @if(session('delete_success')) <!-- xóa thành công -->
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('delete_success')}}</strong>
    </div>
    @endif

    <!-- Thêm mới -->
    <a href="{{route('CTNA.create_monan')}}"><button class='btn btn-primary'>Thêm</button></a>
    <!-- Lọc -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#filter">Lọc</button>
    <!-- Sắp xếp -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#sort">Sắp xếp</button>


    <!-- The Modal -->
    <div class="modal fade" id="filter">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">BỘ LỌC</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class=form-group>
            <label for="filter">Loại món</label>
            <select class='form-control' name="filter" id="filter">
            @foreach($dsDanhMuc as $ds)
            <option value="{{$ds->MaLoai}}">{{$ds->TenLoai}}</option>
            @endforeach
            </select>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <a href="{{route('CTNA.filter_monan')}}"><button type='button' class='btn btn-success'>Lọc</button></a>
        </div>

        </div>
    </div>
    </div>
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
            <?php
            $trangthai;
            foreach($dsMonAn as $monan){?>

            <tr class='size-12'>
                <td style='padding:70px 0'>{{$monan->MaMon}}</td>
                <td style='padding:70px 0'>{{$monan->TenMon}}</td>
                <td><img src="images/{{$monan->TenMon}}/anhdaidien.jpg" alt="image" style='width:250px; height:150px'></td>
                <td style='padding:70px 0'>{{$monan->DoKho}}</td>
                <td style='padding:70px 0'>{{$monan->ThoiGianNau}}</td>
                <td style='padding:70px 0'>{{$monan->NguoiTao}}</td>
                <td style='padding:70px 0'>
                    <?php
                        if($monan->TrangThai == 0){ $trangthai = 'Ngưng hoạt động';}
                            else {$trangthai = 'Hoạt Động';} echo $trangthai;?>
                </td>
                <td style='padding:60px 0'><a href="{{route('CTNA.show_monan', ['id'=>$monan->MaMon])}}"><button class='btn btn-info'>Chi tiết</button></a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

@endsection

