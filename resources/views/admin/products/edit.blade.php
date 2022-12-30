@extends('layouts.admin.master', ['title' => 'Edit Product'])
@section('extraJS')
    <script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create new Product</h5>
            <form class="row g-3" method="post" action="{{route('admin.edit.product')}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product's name" value="{{$product->name}}" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" name="category_id" id="category_id">
                            <option selected="selected" value="{{$product->category_id}}">{{$product->category_name}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Product's price" value="{{$product->price}}" required>
                </div>
                <div class="col-md-1">
                    <label for="priceUnit" class="form-label">Unit Price</label>
                    <select class="form-select" name="priceUnit" id="priceUnit">
                        <option selected="selected">VND</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Product's quantity" value="{{$product->quantity}}" required>
                </div>
                <div class="col-md-8">
                    <label for="images" class="form-label">Images</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="images" name="images" required>
                    </div>
                </div>
                <div class="col-md-10">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Please enter product's description" required>
                        {{$product->description}}
                    </textarea>
                </div>
                <div class="col-md-10">
                    <label for="detail" class="form-label">Product's detail</label>
                    <textarea class="ckeditor form-control" name="detail" id="detail" required>
                        {{$product->detail}}
                    </textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Create
                    </button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- End Multi Columns Form -->
        </div>
    </div>
@endsection
