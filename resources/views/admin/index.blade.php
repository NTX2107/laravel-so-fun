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
<!-- Control Panel -->
<div style="width: 15%; padding-right: 10px">
    <div style="padding-bottom: 30px">ADMIN CONTROL PANEL</div>
    <div style="padding-bottom: 30px">
        <a href="{{route('show.create.product')}}" type="button" class="btn btn-primary">
            <i class="fa-solid fa-circle-plus"></i>
            <span>Create new product</span>
        </a>
    </div>
    <div style="padding-bottom: 30px">
        <a href="{{route('home'    )}}"> Back to Homepage</a>
    </div>
    <div style="padding-bottom: 30px">PRODUCT FILTER
        <form method="post" action="{{route('filter.products')}}">
            @csrf
            <div class="form-group">
                <label for="id"></label>
                <input id="id" name="id" type="text" class="form-control" placeholder="Product ID">
            </div>
            <div class="form-group">
                <label for="name"></label>
                <input id="name" name="name" type="text" class="form-control" placeholder="Product name">
            </div>
            <div class="form-group">
                <label for="quantity"></label>
                <input id="quantity" name="quantity" type="number" class="form-control" placeholder="Product quantity">
            </div>
            <div class="form-group">
                <label for="code"></label>
                <input id="code" name="code" type="text" class="form-control" placeholder="Product code">
            </div>
            <div class="form-group">
                <label for="price"></label>
                <input id="price" name="price" type="text" class="form-control" placeholder="Product price">
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Search</button>
            </div>
        </form>
    </div>
</div>
<!-- Table -->
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
                <td>{{$product->category->name}}</td>
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
