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
                                            <img src="@yield('url')images/avatar/{{session('name')}}.jpg" alt="Avatar"/>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{session('name')}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="@yield('url')images/avatar/{{session('name')}}.jpg" alt="Avatar"/>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{session('name')}}</a>
                                                    </h5>
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

        $("#inp_Create_MonAn").change(function() { 
            readURL(this, "#img_Create_MonAn"); 
        });

        $("#inp_Buoc_1").change(function() { 
            readURL(this, "#img_Buoc_1"); 
        });

        $("#inp_Buoc_2").change(function() { 
            readURL(this, "#img_Buoc_2"); 
        });

        $("#inp_Buoc_3").change(function() { 
            readURL(this, "#img_Buoc_3"); 
        });

        $("#inp_Buoc_4").change(function() { 
            readURL(this, "#img_Buoc_4"); 
        });

        $("#inp_Buoc_5").change(function() { 
            readURL(this, "#img_Buoc_5"); 
        });

        $("#inp_Buoc_6").change(function() { 
            readURL(this, "#img_Buoc_6"); 
        });

        $("#inp_Buoc_7").change(function() { 
            readURL(this, "#img_Buoc_7"); 
        });

        $("#inp_Buoc_8").change(function() { 
            readURL(this, "#img_Buoc_8"); 
        });

        $("#inp_Buoc_9").change(function() { 
            readURL(this, "#img_Buoc_9"); 
        });

        $("#inp_Buoc_10").change(function() { 
            readURL(this, "#img_Buoc_10"); 
        });
    </script>
        

    <script>
        // thêm bước mới
        $("button#addStep").on('click', function(){
            var count = document.forms["CreateProduct"]["count"].value; // đếm số bước hiện tại
            if(count == 10){
                alert('Số bước không được quá 10');
                return false;
            }
            count++;
            var url = 'http://localhost:8000/addStep'; // đường dẫn đến file xử lý thêm bước

            // sử dụng ajax
            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                data:{'count':count}, // dữ liệu sẽ truyển qua bên file xử lý
                success: function (data){ // nếu thành công
                    $('#HuongDan').append(data); // tạo thêm 1 bước mới bằng cách thêm vào cuối thẻ div id=HuongDan
                    document.forms["CreateProduct"]["count"].value = count; // cập nhật lại số bước
                    var inp = '#inp_Buoc_' + count;
                    var img = '#img_Buoc_' + count;

                    $(inp).change(function() { 
                        readURL(this, img); 
                    });
                }    
            });
        });
    </script>
</html>
<!-- end document-->
