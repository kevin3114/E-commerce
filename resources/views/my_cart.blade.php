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
                <a href="{{ route('product.index') }}" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</a>
            </div>
            <form action="{{ route('checkout.index') }}">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
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
                                    <tr data-row-id="{{ $row->id }}">
                                        <td class="p-4">
                                            <div class="media align-items-center">
                                                <img src="{{ asset('uploads/' . $row->product->product_img) }}"
                                                    class="img-thumbnail" alt="Product Picture" height="200px"
                                                    width="200px">
                                                <div class="media-body">
                                                    <span class="d-block text-dark">{{ $row->product->name }}</span>
                                                    <small>
                                                        <span class="text-muted">Category:</span><span>{{ $row->product->product_category }}</span>
                                                        <span class="ui-product-color ui-product-color-sm align-text-bottom"
                                                            style="background:#e81e2c;"></span> &nbsp;
                                                        <span class="text-muted">Brand:</span>{{ $row->product->product_brand }} &nbsp;
                                                        <span class="text-muted">MFD:</span>{{ $row->product->manufacturing_date }}
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4"
                                            id="price-{{ $row->id }}" data-price="{{ $row->product->product_price }}">
                                            ${{ number_format($row->product->product_price, 2) }}
                                        </td>
                                        <td class="align-middle p-4">
                                            <div class="input-group">
                                                <!-- Minus Button -->
                                                <form class="update-quantity-form" action="/cartupdate/{{ $row->id }}" method="POST" id="form-{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="cart_id" value="{{ $row->cart_id }}">
                                                    <input type="hidden" name="Product_id" value="{{ $row->product_id }}">
                                                    <input type="hidden" name="product_qty" value="{{ $row->product_qty }}" id="hidden-qty-{{ $row->id }}">
                                                    <button type="button" class="btn btn-outline-secondary btn-sm decrease" data-row-id="{{ $row->id }}">-</button>
                                                </form>
                                                
                                                <!-- Quantity Input (Readonly) -->
                                                <input type="text" name="product_qty" class="form-control form-control-sm text-center quantity" value="{{ $row->product_qty }}" id="quantity-{{ $row->id }}" data-price="{{ $row->product->product_price }}" data-id="{{ $row->id }}" readonly>

                                                <!-- Plus Button -->
                                                <form class="update-quantity-form" action="/cartupdate/{{ $row->id }}" method="POST" id="form-increase-{{ $row->id }}">
                                                    @csrf
                                                    <input type="hidden" name="cart_id" value="{{ $row->cart_id }}">
                                                    <input type="hidden" name="Product_id" value="{{ $row->product_id }}">
                                                    <input type="hidden" name="product_qty" value="{{ $row->product_qty + 1 }}" class="increase-product_qty">
                                                    <button type="submit" class="btn btn-outline-secondary btn-sm increase" data-row-id="{{ $row->id }}">+</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4 total-price" id="total-{{ $row->id }}">
                                            ${{ number_format($row->product->product_price, 2) }}
                                        </td>
                                        <td class="text-center align-middle px-0">
                                            <a href="/cart" class="shop-tooltip close float-none text-danger" title="Remove">×</a>
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

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const updateCartTotal = (rowId) => {
                    let subtotal = 0;

                    // Find the specific row
                    const row = document.querySelector(`tr[data-row-id="${rowId}"]`);
                    const price = parseFloat(row.querySelector('[data-price]').getAttribute('data-price'));
                    const quantity = parseInt(row.querySelector('.quantity').value);
                    const total = price * quantity;

                    // Update total for the specific row
                    row.querySelector('.total-price').textContent = `$${total.toFixed(2)}`;

                    // Update the subtotal for all products
                    document.querySelectorAll('.total-price').forEach(totalElement => {
                        subtotal += parseFloat(totalElement.textContent.replace('$', '').replace(',', ''));
                    });

                    // Update the subtotal text if it exists
                    const subtotalElement = document.querySelector('#cart-subtotal');
                    if (subtotalElement) {
                        subtotalElement.textContent = `Subtotal: $${subtotal.toFixed(2)}`;
                    }
                };

                // Event listener for quantity changes
                document.querySelectorAll('.decrease').forEach(button => {
                    button.addEventListener('click', (event) => {
                        const rowId = event.target.getAttribute('data-row-id');
                        const qtyInput = document.querySelector(`#quantity-${rowId}`);
                        const hiddenQtyInput = document.querySelector(`#hidden-qty-${rowId}`);
                        
                        // Decrease the quantity
                        let newQuantity = parseInt(qtyInput.value) - 1;
                        newQuantity = Math.max(1, newQuantity); // Prevent going below 1
                        
                        // Update the quantity display
                        qtyInput.value = newQuantity;
                        hiddenQtyInput.value = newQuantity; // Update the hidden input value

                        // Trigger the form submission to update the cart
                        document.querySelector(`#form-${rowId}`).submit();

                        // Update the total for this row
                        updateCartTotal(rowId);
                    });
                });

                // Initial call to update totals on page load
                document.querySelectorAll('.quantity').forEach(input => {
                    const rowId = input.getAttribute('data-id');
                    updateCartTotal(rowId); // Call on each row
                });
            });
        </script>
    </div>
</body>

</html>
