@extends('layouts.admin.master', ['title' => 'Products List'])
@section('content')
    <!-- Filter -->
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Find Products</div>
                <form class="mt-4" method="post" action="{{route('admin.filter.products')}}">
                    @csrf
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group d-flex align-items-center">
                                    <label class="horizontal-label" for="id">ID</label>
                                    <input id="id" name="id" type="text" class="form-control" placeholder="Product ID"
                                           @if(isset($_REQUEST['id'])) value="{{$_REQUEST['id']}}"@endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group d-flex align-items-center">
                                    <label class="horizontal-label" for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                           placeholder="Product name"
                                           @if(isset($_REQUEST['name'])) value="{{$_REQUEST['name']}}"@endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group d-flex align-items-center">
                                    <label class="horizontal-label" for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-select">
                                        <option disabled="disabled" @if(!isset($_REQUEST['category_id'])) selected @endif>Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                            @if(isset($_REQUEST['category_id']) && $_REQUEST['category_id'] == $category->id) selected @endif>
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group d-flex align-items-center">
                                    <label class="horizontal-label" for="quantity">Quantity</label>
                                    <input id="quantity" name="quantity" type="number" class="form-control"
                                           placeholder="Product quantity"
                                           @if(isset($_REQUEST['quantity'])) value="{{$_REQUEST['quantity']}}"@endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group d-flex align-items-center">
                                    <label class="horizontal-label" for="code">Code</label>
                                    <input id="code" name="code" type="text" class="form-control"
                                           placeholder="Product code"
                                           @if(isset($_REQUEST['code'])) value="{{$_REQUEST['code']}}"@endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group d-flex align-items-center">
                                    <label class="horizontal-label" for="price">Price</label>
                                    <input id="price" name="price" type="text" class="form-control"
                                           placeholder="Product price"
                                           @if(isset($_REQUEST['price'])) value="{{$_REQUEST['price']}}"@endif>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="d-flex justify-content-end">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary submit px-3">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Content table -->
    <div class="row">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover mt-4">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Category</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">
                                <a href="{{route('admin.show.product', ['id' => $product->id])}}">
                                    {{$product->id}}
                                </a>
                            </th>
                            <td>{{$product->code}}</td>
                            <td>
                                <a href="{{route('admin.show.product', ['id' => $product->id])}}">
                                    {{$product->name}}
                                </a>
                            </td>
                            <td>{{$product->price}} VND</td>
                            <td>
                                <img class="thumbnail-list" src="{{$product->images}}">
                            </td>
                            <td>{{$product->detail}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->category->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row mb-4">
                    <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item @if($products->onFirstPage()) disabled @endif">
                                    <a class="page-link" href="{{route('admin.filter.products', $_REQUEST+=['page' => $products->currentPage()-1])}}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @for($i = 1; $i <= $products->lastPage(); $i++)
                                    <li class="page-item @if($i == $products->currentPage()) active @endif">
                                        <a class="page-link"
                                           href="{{route('admin.filter.products', $_REQUEST+=['page' => $i])}}">{{$i}}</a>
                                    </li>
                                @endfor
                                <li class="page-item @if($products->currentPage() == $products->lastPage()) disabled @endif">
                                    <a class="page-link" href="{{route('admin.filter.products', $_REQUEST+=['page' => $products->currentPage()+1])}}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
