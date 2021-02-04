@extends('layout')

@section('active_index')class="active has-sub"@endsection

@section('content')

<div class='row' style='margin: 0 20px 10px 20px'>
    <!-- Thông báo -->
    @if(session('create_success')) <!--thêm món ăn thành công-->
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('create_success')}}</strong>
    </div>
    @endif

    @if(session('update_success')) <!-- cập nhật thành công -->
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

    <!-- Các nút chức năng -->
    <div class='col-sm-4'>
        <!-- Thêm mới -->
        <a href="{{route('CTNA.create_monan')}}"><button class='btn btn-primary' style='margin-right:5px'>Thêm</button></a>
        <!-- Lọc -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#filter" style='margin-right:5px'>Lọc</button>
        <!-- Sắp xếp -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#sort" style='margin-right:5px'>Sắp xếp</button>
    </div>
    
    <!-- Tìm kiếm -->
    <div class='col-sm-8'>
        <!-- tìm kiếm -->
        <input type="text" class='form-control' placeholder='Tìm món ăn' style='width:100%;' id='search_mon_an'>
        <div id='SearchResult'></div>
    </div>
    
    <!-- modal bộ lọc -->
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
                        <select class='form-control' id="select_filter">
                            @foreach($dsDanhMuc as $ds)
                            <option value="{{$ds->MaLoai}}">{{$ds->TenLoai}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id='buttonFilter' type='button' class='btn btn-success'>Lọc</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal sắp xếp -->
    <div class="modal fade" id="sort">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">SẮP XẾP</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class=form-group>
                        <span>Độ khó</span><br><br>

                        <div class='row'>
                            <div class='col-sm-4'>
                                <button data-id='De' type='button' class='btn btn-outline-primary dokho' style='width:100%'>Dễ</button>    
                            </div>

                            <div class='col-sm-4'>
                                <button data-id='Trung Binh' type='button' class='btn btn-outline-warning dokho' style='width:100%'>Trung bình</button>    
                            </div>

                            <div class='col-sm-4'>
                                <button data-id='Kho' type='button' class='btn btn-outline-danger dokho' style='width:100%'>Khó</button>
                            </div>
                        </div>               
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    
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
        <tbody id='tbody_index'>
            @foreach($dsMonAn as $monan)
            <tr class='size-12'>
                <td style='padding:70px 0'>{{$monan->MaMon}}</td>
                <td style='padding:70px 0'>{{$monan->TenMon}}</td>
                <td><img src="images/{{$monan->TenMon}}/anhdaidien.jpg" alt="image" style='width:250px; height:150px'></td>
                <td style='padding:70px 0'>{{$monan->DoKho}}</td>
                <td style='padding:70px 0'>{{$monan->ThoiGianNau}}</td>
                <td style='padding:70px 0'>{{$monan->NguoiTao}}</td>
                <td style='padding:70px 0'>
                    @if($monan->TrangThai == 0) Ngưng Hoạt động
                    @else Hoạt động
                    @endif
                </td>
                <td style='padding:60px 0'><a href="{{route('CTNA.show_monan', ['id'=>$monan->MaMon])}}"><button class='btn btn-info'>Chi tiết</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- phân trang -->
    <div id='PhanTrangMonAn' class='col-12 d-flex justify-content-center' style='margin-top:20px'>
    {{$dsMonAn->links()}}
    </div>
    
</div>

@endsection

