<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Staff-Managerment Login</title>

    <!-- Custom fonts for this template-->
    <link href="sb-admin-2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .button-clicked {
            background: #ffe0b3;
            cursor: not-allowed;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    @include('partials.message')
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div
                                            class="form-group usernamedivlogin @error('username') has-error has-feedback @enderror">
                                            <input type="text" class="form-control form-control-user usernameinputlogin @error('username')
                                            is-invalid @enderror" id="exampleInputEmail"
                                                onkeyup="duplicateUsernamelogin(this)" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="username">

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <span class="invalid-feedback checkusernamelogin" role="alert">
                                                <strong class="textusernamelogin"></strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id=" exampleInputPassword" placeholder="Password" name="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block login-btn"
                                            id="btn-submitlogin">
                                            Login
                                        </button>
                                        <hr>
                                        <button type="button" class="btn btn-google btn-user btn-block button-clicked"
                                            disabled>
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </button>
                                        <button type="button" class="btn btn-facebook btn-user btn-block button-clicked"
                                            disabled>
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/password/reset/">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="sb-admin-2/vendor/jquery/jquery.min.js"></script>
    <script src="sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sb-admin-2/js/sb-admin-2.min.js"></script>

</body>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".checkusernamelogin").hide();

function duplicateUsernamelogin(element) {
    var username = $(element).val();
    $.ajax({
        type: "POST",
        url: '/loginusername',
        data: {
            username: username
        },
        dataType: "json",
        success: function(res) {
            if (res.empty) {
                $(".checkusernamelogin").show();
                $(".textusernamelogin").html('The username field is required.');
                $(".usernameinputlogin").addClass('is-invalid');
                $(".usernamedivlogin").addClass('has-error has-feedback');
                $("#btn-submitlogin").attr("disabled", true).addClass('button-clicked');
            } else if (res.exists) {
                $(".checkusernamelogin").show();
                $(".textusernamelogin").html('The username does not match.');
                $(".usernameinputlogin").addClass('is-invalid');
                $(".usernamedivlogin").addClass('has-error has-feedback');
                $("#btn-submitlogin").attr("disabled", true).addClass('button-clicked');
            } else {
                $(".checkusernamelogin").hide();
                $(".usernameinputlogin").removeClass('is-invalid').addClass('is-valid');
                $(".usernamedivlogin").removeClass('has-error has-feedback').addClass('has-success has-feedback');
                $("#btn-submitlogin").attr("disabled", false).removeClass('button-clicked');
            }
        },
        error: function(jqXHR, exception) {

        }
    });
}
</script>

</html>