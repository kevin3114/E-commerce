<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADD PRODUCT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div>@include('admin_navbar')</div>
    <div class="container mt-5">
        <h2>ADD NEW PRODUCT</h2>
        <div>
            @if(session('alert'))
                <div class="mt-3 alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
        </div>
        <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5">
                <div class="col">
                    <label>Product Image</label>
                    <input type="file" class="form-control" name="product_img">
                    <span class="text-danger">@error('product_img'){{ $message }}@enderror</span>
                </div>
                <div class="col">
                    <label>Product Name</label>
                    <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name">
                    <span class="text-danger">@error('product_name'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <label>Product Price</label>
                    <input type="number" class="form-control" placeholder="Enter Product Price" name="product_price">
                    <span class="text-danger">@error('product_price'){{ $message }}@enderror</span>
                </div>
                <div class="col">
                    <label>Product category</label>&nbsp;<a href="{{ route('category.create') }}" class="btn btn-primary btn-sm mb-1">Add category</a>
                    <select name="product_category" class="form-control">
                        <option selected hidden>Select Product Category</option>
                        @foreach($categoryData as $row)
                         <option value="{{ $row -> category_name }}">{{ $row -> category_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('product_category'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <label>Product Weight</label>
                    <input type="number" class="form-control" name="product_weight" placeholder="Enter product weight">
                    <span class="text-danger">@error('product_weight'){{ $message }}@enderror</span>
                </div>
                <div class="col">
                    <label>Product Brand</label>&nbsp;<a href="{{ route('brand.create') }}" class="btn btn-primary btn-sm mb-1">Add Brand</a>
                    <select name="product_brand" class="form-control">
                        <option selected hidden>Select Product Brand</option>
                        @foreach($brandData as $row)
                        <option value="{{ $row -> brand_name }}">{{ $row -> brand_name }}</option>
                       @endforeach
                    </select>
                    <span class="text-danger">@error('product_brand'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <label>Manufacturing Date</label>
                    <input type="date" class="form-control" name="manufacturing_date">
                    <span class="text-danger">@error('manufacturing_date'){{ $message }}@enderror</span>
                </div>
                <div class="col">
                    <label>Product Description</label>
                    <textarea name="product_desc" class="form-control" rows="1" placeholder="Enter product Description"></textarea>
                    <span class="text-danger">@error('product_desc'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success">ADD PRODUCT</button>
                    <a href="{{ route('admin.create') }}" class="btn btn-dark">CLEAR</a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
