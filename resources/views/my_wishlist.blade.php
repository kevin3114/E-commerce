<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Wishlist</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .wishlist-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .p_img {
            width: 100%;
            height: 150px;
            object-fit: contain;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
        }

        .wishlist-btns {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .wishlist-btns button {
            font-size: 0.8rem;
        }

        .card-body {
            padding: 0.75rem;
        }

        .card-title {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <div>@include('navbar')</div>
    <div class="container">
        <div class="wishlist-title">
            <span>My Wishlist</span>
        </div>

        <div class="row">
            @foreach($wishlistData as $row)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card h-100">
                    <!-- Assuming the product image is correctly referenced -->
                    <img src="{{ asset('uploads/' . $row->product->product_img) }}" class="p_img mt-2" alt="Product Picture">
                    <div class="card-body">
                        <!-- Correctly accessing the product name -->
                        <h5 class="card-title text-truncate" title="{{ $row->product->product_name }}">{{ $row->product->product_name }}</h5>
                        <p class="card-text text-truncate" title="{{ $row->product->product_desc }}">{{ $row->product->product_desc }}</p>
                        <p class="fw-bold"><strong>Price:</strong> ${{ $row->product->product_price }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
