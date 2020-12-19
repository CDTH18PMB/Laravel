<!DOCTYPE html>
<html lang="en">

<head>
    @include('/header/header');
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{route('CTNA.index')}}">
                    <img src="@yield('url')images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li @yield('active_index')>
                            <a class="js-arrow" href="{{route('CTNA.index')}}"><i class="fas fa-book"></i>Món ăn</a>
                        </li>
                        <li @yield('active_danhmuc')>
                            <a class="js-arrow" href="{{route('CTNA.danhmuc')}}"><i class="fas fa-list"></i>Danh mục</a>
                        </li>
                        <li @yield('active_duyet')>
                            <a class="js-arrow" href="{{route('CTNA.duyet')}}"><i class="fas fa-book"></i>Công Thức đang chờ</a>
                        </li>
                        <li @yield('active_binhluan')>
                            <a class="js-arrow" href="{{route('CTNA.binhluan')}}"><i class="fas fa-comment"></i>Bình luận</a>
                        </li>
                        <li @yield('active_taikhoan')>
                            <a class="js-arrow" href="{{route('CTNA.taikhoan')}}"><i class="fas fa-user"></i>Tài khoản</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="@yield('url')images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">John Doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="@yield('url')images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
        
                                            <div class="account-dropdown__footer">
                                                <a href="{{route('Auth.getLogout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                @yield('content')
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
</body>
    @include('/footer/footer');

    <!-- <script type="text/javascirpt">
        $('.binhluan_duyet_btn').click(function() {
            var TrangThai = $(this).data('TrangThai');
            var MaMon     = $(this).attr('MaMon');
            alert(TrangThai);
            alert(MaMon);
        });



    </script> -->



    <script>
        function readURL(input, idIMG) { 
            if (input.files && input.files[0]) { 
            var reader = new FileReader(); 
            reader.onload = function(e) { 
                $(idIMG).attr('src', e.target.result); 
            } 
            reader.readAsDataURL(input.files[0]); 
            }       
        }   


        //Tài khoản
        $("#inp_Avatar").change(function() { 
            readURL(this, "#img_Avatar"); 
        });
        
        //Món ăn
        $("#inp_MonAn").change(function() { 
            readURL(this, "#img_MonAn"); 
        });

        $("#inp_Create_MonAn").change(function() { 
            readURL(this, "#img_Create_MonAn"); 
        });
        //Duyệt bình luận
        $('.binhluan_duyet_btn').click(function() {
            var trangthai = $(this).data('trangthai');
            var MaMon     = $(this).attr('id');
            if(trangthai==0){
                var alert = 'Duyệt thành công';
            }
            // else{
            //     var alert = 'Xoá thành công';
            // }

            $.ajax({
                url:"{{url('/allow-comment')}}",
                method:"POST",// phương thức gửi dữ liệu.
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{trangthai:trangthai,MaMon:MaMon},
                success:function(data){ //dữ liệu nhận về
                    location.reload();
                    $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');
                }

            });
            
            // alert(trangthai);
            // alert(MaMon);

        });

        //Xoá bình luận 
        $('.binhluan_xoa_btn').click(function() {
            var trangthai = $(this).data('trangthai');
            var MaMon     = $(this).attr('id');
            if(trangthai==1){
                var alert = 'Xoá thành công';
            }
            

            $.ajax({
                url:"{{url('/delete-comment')}}",
                method:"DELETE",// phương thức gửi dữ liệu.
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{trangthai:trangthai,MaMon:MaMon},
                success:function(data){ //dữ liệu nhận về
                    location.reload();
                    $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');
                }

            });
            
            // alert(trangthai);
            // alert(MaMon);

        });

        //duyệt công thức
        $('.congthuc_duyet_btn').click(function() {
            var trangthai = $(this).data('trangthai');
            var MaMon     = $(this).attr('id');
            if(trangthai==0){
                var alert = 'Duyệt thành công';
            }
            // else{
            //     var alert = 'Xoá thành công';
            // }

            $.ajax({
                url:"{{url('/allow-cook')}}",
                method:"POST",// phương thức gửi dữ liệu.
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{trangthai:trangthai,MaMon:MaMon},
                success:function(data){//Dữ liệu nhận về
                    location.reload();
                    $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');
                }

            });
        });
        //xoa cong thuc
        $('.congthuc_xoa_btn').click(function() {
            var trangthai = $(this).data('trangthai');
            var MaMon     = $(this).attr('id');
            if(trangthai==1){
                var alert = 'Xoá thành công';
            }
            

            $.ajax({
                url:"{{url('/delete-cook')}}",
                method:"DELETE",// phương thức gửi dữ liệu.
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{trangthai:trangthai,MaMon:MaMon},
                success:function(data) //Dữ liệu nhận về
                {
                    location.reload();
                    $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');
                }

            });
            
            // alert(trangthai);
            // alert(MaMon);

        });

        //Tìm kiếm
        $(document).ready(function(){

            $('#country_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
            var query = $(this).val(); //lấy gía trị ng dùng gõ
            if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
        {
            var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
             $.ajax({
                url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' 
                method:"POST", // phương thức gửi dữ liệu.
                data:{query:query, _token:_token},
                success:function(data){ //dữ liệu nhận về
                $('#countryList').fadeIn();  
                $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
            }
        });
        }
    });

        $(document).on('click', 'li', function(){  
            $('#country_name').val($(this).text());  
            $('#countryList').fadeOut();  
        });  

    });


    </script>
</html>
<!-- end document-->
