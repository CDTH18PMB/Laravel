<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log In</title>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    
    <link rel="stylesheet" href="css/login_style.css" type="text/css" media="all" />
    

    <!-- fontawesome v5 -->
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <section class="forms">
        <div class="container">
                @if(session('status'))
                <div class="alert alert-danger alert-dismissible fade show" style='margin:20px 0; margin:auto; width:400px'>
                    <strong>{{session('status')}}</strong>
                </div>
                @endif
            <div class="forms-grid">

                <!-- login -->
                <div class="login">

                    <span class="fas fa-sign-in-alt"></span>
                    <strong>Welcome!</strong>
                    <span>Sign in to your account</span>

                    <form action="{{route('Auth.postLogin')}}" method="post" class="login-form">
                        @csrf
                        <fieldset>
                            <div class="form">
                                <div class="form-row">
                                    <span class="fas fa-user"></span>
                                    <label class="form-label" for="input">Name</label>
                                    <input type="text" class="form-text" name='username' required>
                                </div>
                                <div class="form-row">
                                    <span class="fas fa-eye"></span>
                                    <label class="form-label" for="input">Password</label>
                                    <input type="password" class="form-text" name='password' required>
                                </div>
                                <div class="form-row button-login">
                                    <button type='submit' class="btn btn-login">Login <span
                                            class="fas fa-arrow-right"></span></button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <!-- //login -->

                
                <!-- //register -->
            </div>
        </div>
    </section>

</body>

</html>