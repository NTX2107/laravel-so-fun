<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>My Admin</title>
</head>
<body style="display: flex">
<div style="width: 15%">
    <div style="padding-bottom: 30px">ADMIN CONTROL PANEL</div>
    <div style="padding-bottom: 30px">
        <a href="{{route('show.create.product')}}" type="button" class="btn btn-primary">
            <i class="fa-solid fa-circle-plus"></i>
            <span>Create new product</span>
        </a>
    </div>
    <div>
        <a href="{{route('home')}}"> Back to Homepage</a>
    </div>
</div>
<div style="width: 80%">
    <table class="table">
        <thead class="table-info">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Images</th>
            <th scope="col">Detail</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Category_id</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->code}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->images}}</td>
                <td>{{$product->detail}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category_id}}</td>
                <td>
                    <a href="{{route('show.edit.product', ['id' => $product->id])}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form method="POST" action="{{route('delete.product', ['id' => $product->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fa-solid fa-trash" onclick="confirmDelete()"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div style="width: 5%"></div>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script>
    function confirmDelete() {
        const check = confirm('Are you sure deleting this product?');
        if (check) {
            window.open({{route('show.all.products')}}, "_self")
        }
    }
</script>
</body>
</html>
