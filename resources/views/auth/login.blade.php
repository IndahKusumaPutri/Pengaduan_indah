<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pengaduan Masyarakat</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="../../images/logo.svg" alt="logo">
                            </div>
                            <h4>Pengaduan Masyarakat</h4>
                            <h6 class="font-weight-light">Masuk untuk Memulai Pengaduan</h6>

                            <form class="pt-3" action="{{ Route('login') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" name="email"
                                        placeholder="Email">
                                    {{-- <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div> --}}
                                </div>

                                @if ($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif

                                <div class="input-group mb-3">
                                    <input type="password" class="form-control  form-control-lg" name="password" placeholder="Password">
                                    {{-- <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div> --}}
                                </div>

                                @if ($errors->has('password'))
                                    <div class="text-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif

                                <div class="mt-3">
                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="../../index.html">MASUK</a>
                                </div>
                                
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>

                                <div class="mb-2">
                                    <button type="button" class="btn btn-block btn-google auth-form-btn">
                                        <i class="ti-google mr-2"></i>Connect using Google
                                    </button>
                                </div>
                                
                                <div class="text-center mt-4 font-weight-light">
                                    Belum Memiliki Akun? <a href="{{ route('register') }}" class="text-primary">Daftar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
