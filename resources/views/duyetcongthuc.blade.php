@extends('layout')

@section('active_duyet')class="active has-sub"@endsection

@section('content')
<div class="container box"><h4 align="left" >Tìm kiếm</h4><br />   
   <div class="form-group">
    <input type="text" name="country_name" id="country_name"  class="form-control input-lg" placeholder="Nhập vào ô tìm kiếm" />
    <div id="countryList"><br>
    </div>
  </div>
  {{ csrf_field() }}
</div>
<div  id="notify_comment"  ></div>

<div class='form-create' >

    <table class='table'>
        <thead class='thead-dark'>
            <tr class='size-14'>
                <th>Mã món</th>
                <th>Người tạo</th>
                <th>Tên món</th>
                <th>Ảnh đại diện</th>
                <th>Độ khó</th>
                <th>Thời gian nấu</th>
                <th>Loại món</th>
                <th>Trạng thái</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
        <tbody>

        @foreach($dsDuyetCongThuc as $duyetct)
            <tr style='text-align:center'>
                <td style='padding:70px 0'>{{$duyetct->MaMon}}</td>
                <td style='padding:70px 0'>{{$duyetct->NguoiTao}}</td>
                <td style='padding:70px 0'>{{$duyetct->TenMon}}</td>
                <td><img src="images/{{$duyetct->TenMon}}/{{$duyetct->AnhDaiDien}}" alt="image" width='200px' height='200px'></td>
                <td style='padding:70px 0'>{{$duyetct->DoKho}}</td>
                <td style='padding:70px 0'>{{$duyetct->ThoiGianNau}}</td>
                <td style='padding:70px 0'>{{$duyetct->LoaiMon}}</td>
                <td style='padding:70px 0'>{{$duyetct->TrangThai}}</td>
                <td >
                    <div style='margin-bottom:3px'>
                        <a href="{{route('CTNA.show_monan', ['id'=>$duyetct->MaMon])}}" class='link_duyet'>Chi tiết</a>
                    </div>

                    <div style='margin-bottom:3px'>
                    <input type="button" data-TrangThai="2" id="{{$duyetct->MaMon}}"  class="btn btn-primary  congthuc_duyet_btn" value="Duyệt" >
                    </div>

                    <div>
                    <input type="button" data-TrangThai="1" id="{{$duyetct->MaMon}}"  class="btn btn-danger congthuc_xoa_btn" value="Xoá" >
                    </div> 

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

@endsection