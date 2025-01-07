<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .order-form {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            margin-bottom: 15px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div>@include('navbar')</div>
    <div class="container">
        <div>
            @if(session('success'))
                <div class="mt-3 alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="order-form">
                    <h2 class="form-header">Order Your Products</h2>
                    <form action="{{ route('order.store') }}" method="post">
                        @csrf
                        @foreach($orderData as $row)
                            <div class="product-card card">
                                <div class="card-header">
                                    <h5 class="card-title">{{ $row->product->product_name }}</h5>
                                    <input type="hidden" name="product_id" value={{ $row->product_id }}>
                                </div>
                                <div class="card-body">
                                    <p>{{ $row->product->product_desc }}</p>
                                    <input type="number" class="form-control" name="product_qty" value={{ $row->product_qty }} readonly>
                                </div>
                            </div>
                        @endforeach

                        <!-- Customer Information -->
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control mb-3" id="name" name="full_name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control mb-3" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Delivery Address</label>
                            <textarea class="form-control mb-3" id="address" name="delivery_address" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control mb-3" id="phone" name="phone_no" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Submit Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
