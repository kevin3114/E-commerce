<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .whislist i:hover{
                color: red;
        }
    </style>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link whislist" href="{{ route('wishlist.index') }}"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>

</html>
