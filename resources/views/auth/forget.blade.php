<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Forgot Password</title>
    <!-- Custom fonts for this template-->
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/custom-style.css" rel="stylesheet">
</head>
<body class="main-bg" style="background-image:url(public/img/login-bg.jpg);">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-xl-8 col-lg-8 col-md-9 pt-3">
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
                                        <h1 class="h4 font-weight-bold text-black mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4 small">Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user login" action="" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">
                                                 @if ($errors->has('email'))
                                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                                  @endif
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                               <input type="submit" class="btn btn-warning btn-user text-black font-weight-sbold fx-2" value="Reset Password">
                                            </div>
                                            <div class="col-lg-6 t-right">
                                                <a class="small text-black pl-3" href="login.html">Already have an account?</a>
                                            </div>
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
</body>
</html>