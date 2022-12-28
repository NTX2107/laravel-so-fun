<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>{{$title}}</title>

    <!-- Icons font CSS-->
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/css/fontawesome.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">{{$title}}</h2>
                <form method="post" action="{{route('create.product')}}">
                    @csrf
                    <div class="input-group">
                        <label>
                            <input id="name" class="input--style-1" type="text" placeholder="Product Name" name="name"required>
                        </label>
                    </div>
                    <div class="input-group">
                        <label>
                            <input id="description" class="input--style-1" type="text" placeholder="Description" name="description" required>
                        </label>
                    </div>
                    <div class="input-group">
                        <label>
                            <input id="detail" class="input--style-1" type="text" placeholder="Detail" name="detail" required>
                        </label>
                    </div>
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <label>
                                <select name="category_id" id="category_id">
                                    <option disabled="disabled" selected="selected">Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </label>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>
                            <input id="price" class="input--style-1" type="number" placeholder="Price" name="price" required>
                        </label>
                    </div>
                    <div class="input-group">
                        <label>
                            <input id="images" class="input--style-1" type="text" placeholder="Images Url" name="images" required>
                        </label>
                    </div>
                    <div class="input-group">
                        <label>
                            <input id="quantity" class="input--style-1" type="text" placeholder="Quantity" name="quantity" required>
                        </label>
                    </div>
                    {{--                        <div class="col-2">--}}
                    {{--                            <div class="input-group">--}}
                    {{--                                <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" name="birthday">--}}
                    {{--                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <div class="p-t-20">
                        <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        <a class="nav-link" type="button" href="{{route('show.all.products')}}">Back to Admin Page</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<!-- Vendor JS-->
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('vendor/datepicker/moment.min.js')}}"></script>
<script src="{{asset('vendor/datepicker/daterangepicker.js')}}"></script>

<!-- Main JS-->
<script src="{{asset('assets/js/global.js')}}"></script>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
