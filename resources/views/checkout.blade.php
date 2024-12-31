<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checkout-container {
            margin-top: 50px;
        }
        .card {
            border-radius: 10px;
        }
        .total-price {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div>@include('navbar')</div>
    <div class="container checkout-container">
        <div>
            @if(session('alert'))
                <div class="mt-3 alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
        </div>
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Billing Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="full_name" placeholder="Enter Name">
                            <span class="text-danger">@error('full_name') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Shipping Address</label>
                            <input type="text" class="form-control" id="address" name="shipping_address" placeholder="Enter Address">
                            <span class="text-danger">@error('shipping_address') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
                            <span class="text-danger">@error('city') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                            <span class="text-danger">@error('state') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="zip" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zip" name="zipcode" placeholder="12345">
                            <span class="text-danger">@error('zipcode') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
                            <span class="text-danger">@error('country') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Order Summary</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group" id="cart-items-list">
                            @foreach($cartItemData as $row)
                            <input type="hidden" name="cart_item_id" value="{{ $row->id }}">
                            <li class="list-group-item d-flex justify-content-between cart-item" data-price="{{ $row->product->product_price }}" data-quantity="{{ $row->product_qty }}">
                                <span>{{ $row->product->product_name }}</span>
                                <span class="item-total">${{ $row->total }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <li class="list-group-item d-flex justify-content-between total-price">
                            <span>Total</span>
                            <span id="grand-total">$54.98</span>
                        </li>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Proceed to Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>

    <script>
        function updateTotal() {
            let grandTotal = 0;

            document.querySelectorAll('.cart-item').forEach(function(item) {
                let price = parseFloat(item.getAttribute('data-price'));
                let quantity = parseInt(item.getAttribute('data-quantity'));
                let itemTotal = price * quantity;

                item.querySelector('.item-total').textContent = '$' + itemTotal.toFixed(2);
                grandTotal += itemTotal;
            });

            document.getElementById('grand-total').textContent = '$' + grandTotal.toFixed(2);
        }
        updateTotal();
    </script>
</body>
</html>
