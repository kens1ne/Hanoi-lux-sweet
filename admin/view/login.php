<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>

    <meta charset="utf-8" />
    <title>Levart Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="client/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="../public/admin/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="../public/admin/css/bootstrap.min.css?v=1.0.3" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../public/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../public/admin/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="../public/admin/css/custom.min.css" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z">
                    </path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.php" class="d-inline-block auth-logo">
                                    <img src="../public/admin/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Levart.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form id="log_form">
                                        <div id="authentication"></div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username"
                                                placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot
                                                    password?</a>
                                            </div>
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5"
                                                    placeholder="Enter password" id="password">
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                    type="button" id="password-addon"><i
                                                        class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember
                                                me</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" id="signin">Đăng Nhập</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                document.write(new Date().getFullYear())
                                </script> Levart

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
    <script type="text/javascript">
    $(document).ready(function() {
        $("#signin").click(function() {
            $.ajax({
                url: "index.php?action=login",
                method: "POST",
                data: {
                    type: 'login',
                    username: $("#username").val(),
                    password: $("#password").val()
                },
                dataType: "json",
                beforeSend: function() {
                    $('#signin').attr('disabled', 'disabled');
                    $('#signin')['html'](
                        `<i class="spinner-border spinner-border-sm"></i> Loading...`
                    );
                },
                success: function(result) {
                    $('#signin').attr('disabled', false);
                    if (result.status == true) {
                        $('#authentication').html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                ${result.msg}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`);
                        $('#signin')['html'](`Đăng Nhập`);
                        window.location = "index.php";
                    } else {
                        $('#authentication').html(`
                            <div class="alert alert-danger alert-dismissible fade show mb-xl-0" role="alert">
                                ${result.msg}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`);
                        $('#signin')['html'](`Đăng Nhập`);
                        $('#log_form')[0].reset();
                    }
                }
            });
        });
    });
    </script>
    <!-- JAVASCRIPT -->
    <script src="../public/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="../public/admin/libs/node-waves/waves.min.js"></script>
    <script src="../public/admin/libs/feather-icons/feather.min.js"></script>
    <script src="../public/admin/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="../public/admin/js/plugins.js"></script>

    <!-- particles js -->
    <script src="../public/admin/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="../public/admin/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="../public/admin/js/pages/password-addon.init.js?v=1.0.0"></script>
</body>


</html>