<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .table th, .table td {
            text-align: center;
        }
        .filter-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div>@include('navbar')</div>
<div class="container">
    <h2 class="text-center mb-4">Orders List</h2>
    
    <div class="filter-container">
        <form action="/orders/category" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-select form-select-sm" name="product_category">
                        <option selected hidden>Filter by Category</option>
                        @foreach($categoryData as $row)
                        <option value="{{ $row->category_name }}" {{ request()->get('product_category') == $row->category_name ? 'selected' : '' }}>
                            {{ $row->category_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" name="price_range">
                        <option selected hidden>Filter by Price</option>
                        <option value="low">Low</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-sm">Apply Filters</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Orders Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product</th>
                <th>Category</th>
                <th>MFD</th>
                <th>Price</th>
                <th>Delivery Address</th>
                <th>Phone No</th>
            </tr>
        </thead>
        <tbody>
            @foreach($myOrderData as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->full_name }}</td>
                <td>{{ $row->product->product_name }}</td>
                <td>{{ $row->product->product_category }}</td>
                <td>{{ $row->product->manufacturing_date }}</td>
                <td>{{ $row->product->product_price }}</td>
                <td>{{ $row->delivery_address }}</td>
                <td>{{ $row->phone_no }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
