<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    {{-- Link for Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Link for FontAwesome 4 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .p_img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            transition: 0.5s;
        }

        .p_img:hover {
            transform: scale(1.1);
        }

        .card-body {
            padding: 1rem;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .card-btns {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .card-btns button,
        .card-btns a {
            font-size: 0.85rem;
            padding: 8px 12px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-footer {
            padding: 0.75rem;
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .search-btns {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div>
        <div>@include('admin_navbar')</div>
        <div class="container mt-3">
            <h1>PRODUCTS</h1>
            <!-- Displaying Product Cards -->
            <div>
                @if(session('alert'))
                    <div class="mt-3 alert alert-danger">
                        {{ session('alert') }}
                    </div>
                @endif
            </div>
            <div class="row mt-4">
                @foreach ($productData as $row)
                    <div class="col-md-3 col-sm-4 col-6 mb-3">
                        <div class="card">
                            <img src="{{ asset('uploads/' . $row->product_img) }}" class="card-img-top p_img" alt="Product Picture">
                            <div class="card-body">
                                <h5 class="card-title">{{ $row->product_name }}</h5>
                                <p class="card-text">
                                    <strong>Price:</strong> <i class="fa fa-inr"></i> {{ $row->product_price }}<br>
                                    <strong>Brand:</strong> {{ $row->product_brand }}<br>
                                    <strong>Category:</strong> {{ $row->product_category }}<br>
                                    <strong>Weight:</strong> {{ $row->product_weight }}<br>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
