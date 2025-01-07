<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CART</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div>@include('navbar')</div>
    <div class="container mt-3">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="float-right">
                <a href="{{ route('product.index') }}" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to
                    shopping</a>
            </div>
            <form action="{{ route('checkout.index') }}">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <!-- Set columns width -->
                                <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details
                                </th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                <th class="text-center py-3 px-4" style="width: 140px;">Quantity</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                <th class="text-center align-middle py-3 px-0" style="width: 40px;">
                                    <a href="#" class="shop-tooltip float-none text-light" title=""
                                        data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItemData as $cart)
                                @foreach ($cart->cartItems as $row)
                                    <tr>
                                        <td class="p-4">
                                            <div class="media align-items-center">
                                                <img src="{{ asset('uploads/' . $row->product->product_img) }}"
                                                    class="img-thumbnail" alt="Product Picture" height="200px"
                                                    width="200px">
                                                <div class="media-body">
                                                    <span class="d-block text-dark">{{ $row->product->name }}</span>
                                                    <small>
                                                        <span class="text-muted">Category:
                                                        </span><span>{{ $row->product->product_category }}</span>
                                                        <span
                                                            class="ui-product-color ui-product-color-sm align-text-bottom"
                                                            style="background:#e81e2c;"></span> &nbsp;
                                                        <span class="text-muted">Brand:
                                                        </span>{{ $row->product->product_brand }} &nbsp;
                                                        <span class="text-muted">MFD:
                                                        </span>{{ $row->product->manufacturing_date }}
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4"
                                            id="price-{{ $row->id }}">
                                            ${{ number_format($row->product->product_price, 2) }}
                                        </td>
                                        <td class="align-middle p-4">
                                            <div class="input-group">

                                                <!-- Minus Button -->
                                                <form action="/cartupdate/{{ $row->id }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="cart_id" value="{{ $row->cart_id }}">
                                                    <input type="hidden" name="Product_id"
                                                        value="{{ $row->product_id }}">
                                                    <input type="hidden" name="product_qty"
                                                        value="{{ $row->product_qty - 1 }}"
                                                        class="increase-product_qty">
                                                    <button type="button"
                                                        class="btn btn-outline-secondary btn-sm decrease"
                                                        id="decrease-{{ $row->id }}"
                                                        data-id="{{ $row->id }}"
                                                        data-price="{{ $row->product->product_price }}">-</button>

                                                    <!-- Quantity Input -->
                                                </form>
                                                <input type="text" name="product_qty"
                                                    class="form-control form-control-sm text-center quantity"
                                                    value="{{ $row->product_qty }}" id="quantity-{{ $row->id }}"
                                                    data-price="{{ $row->product->product_price }}"
                                                    data-id="{{ $row->id }}" readonly>

                                                <!-- Plus Button -->
                                                <form action="/cartupdate/{{ $row->id }}" method="POST">  
                                                    @csrf
                                                    <input type="hidden" name="cart_id" value="{{ $row->cart_id }}">
                                                    <input type="hidden" name="Product_id" value="{{ $row->product_id }}">
                                                    <input type="hidden" name="product_qty" value="{{ $row->product_qty + 1 }}" class="increase-product_qty">
                                                    <button type="submit"
                                                        class="btn btn-outline-secondary btn-sm increase"
                                                        id="increase-{{ $row->id }}"
                                                        data-id="{{ $row->id }}"
                                                        data-price="{{ $row->product->product_price }}">+</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4"
                                            id="total-{{ $row->id }}" name="total_price">
                                            ${{ number_format($row->product->product_price, 2) }}
                                        </td>
                                        <td class="text-center align-middle px-0">
                                            <a href="/cart" class="shop-tooltip close float-none text-danger"
                                                title="Remove">×</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-3">Proceed to Checkout</button>
            </form>
        </div>

        {{-- scripts --}}
        <script>
            function updateCart() {
                let grandTotal = 0;
                document.querySelectorAll('.quantity').forEach(function(input) {
                    let productId = input.getAttribute('data-id');
                    let price = parseFloat(input.getAttribute('data-price'));
                    let quantity = parseInt(input.value);
                    let total = price * quantity;

                    document.getElementById('total-' + productId).textContent = '$' + total.toFixed(2);

                    grandTotal += total;
                });

                document.getElementById('grand-total').textContent = '$' + grandTotal.toFixed(2);
            }

            document.querySelectorAll('.quantity').forEach(function(input) {
                input.addEventListener('input', function() {
                    updateCart();
                });
            });

            document.querySelectorAll('.increase').forEach(function(button) {
                button.addEventListener('click', function() {
                    let input = document.getElementById('quantity-' + button.getAttribute('data-id'));
                    let currentValue = parseInt(input.value);
                    input.value = currentValue + 1;
                    updateCart();
                });
            });

            document.querySelectorAll('.decrease').forEach(function(button) {
                button.addEventListener('click', function() {
                    let input = document.getElementById('quantity-' + button.getAttribute('data-id'));
                    let currentValue = parseInt(input.value);
                    if (currentValue > 1) {
                        input.value = currentValue - 1;
                        updateCart();
                    }
                });
            });
            updateCart();
        </script>
    </div>
</body>

</html>
