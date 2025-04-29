<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="{{asset('public/img/favicon_io/favicon.ico')}}">
     <link rel="icon" href="{{asset('public/img/favicon_io/favicon-16x16.png')}}" type="image/png" sizes="16x16"/>
     <link rel="icon" href="{{asset('public/img/favicon_io/favicon-32x32.png')}}" type="image/png" sizes="32x32"/>
    <title>Login</title>
    <!-- Custom fonts for this template-->
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/custom-style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <style type="text/css">
        span.loader-img {
    padding-left: 100px;
}
    </style>

</head>
<body class="main-bg" style="background-image:url(public/img/login-bg.jpg);">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-xl-8 col-lg-8 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-4 bg-warning p-2 p-sm-5 br-5 text-center d-flex justify-content-center flex-sm-column">
                                <img class="img-fluid w-5" src="public/img/logo1.webp">
                             </div>
                            <div class="col-lg-8 py-3">
                                <div class="p-3 p-sm-3">
                                    <div class="text-center">
                                        <h1 class="h4 font-weight-bold text-black mb-4">Login</h1>
                                    </div>
                                    <form class="user login" method="POST" action="{{secure_url('login_custom')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..."  name="email">
                                                 @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group row pl-2">
                                            <div class="col-lg-6 custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember"id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                            <div class="col-lg-6 t-right">
                                                <p class="mb-0"><a class="small text-black" href="forgot-password.html">Forgot Password?</a></p>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                               <input id="login-btn" type="submit" class="btn btn-warning btn-user text-black font-weight-sbold fx-2" value="login"><span class="loader-img d-none"><img src="public/img/popup-img/Rhombus.gif"></span>
                                                    
                                               
                                        </div>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="public/js/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

                                     @if(Session::has('error'))
                                             <script type="text/javascript">
                                                 $.toast({
                                                        heading: 'Error',
                                                        text: "{{ session('error') }}",
                                                        icon: 'error',
                                                        loader: true,        // Change it to false to disable loader
                                                        loaderBg: 'red',
                                                        backgroundcolor : 'red',  // To change the background
                                                        position: 'top-right'
                                                    })
                                             </script>
                                    @endif

                                    <script type="text/javascript">
                                        $( document ).ready(function() {
                                            $( "#login-btn" ).click(function() {
                                              $('.loader-img').removeClass('d-none');
                                            });
                                        });
                                    </script>
</body>
</html>