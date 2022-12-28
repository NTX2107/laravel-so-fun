<!doctype html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('assets/css/auth/style.css')}}">

</head>
<body class="img js-fullheight" style="background-image: url({{asset('assets/images/bg.jpg')}});">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">MY OWN SHOPPING</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">Register</h3>
                    <form action="{{route('auth.register')}}" method="post" class="signin-form">
                        @csrf
                        <div class="form-group">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Your name" required>
                        </div>
                        <div class="form-group">
                            <input id="email" name="email" type="text" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">I agree to User's ....
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </form>
                    <div class="social d-flex text-center">
                        <a href="{{route('show.login')}}" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Login</a>
                        <a href="{{route('home')}}" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Back to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/popper/popper.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/auth/auth.js')}}"></script>

</body>
</html>



