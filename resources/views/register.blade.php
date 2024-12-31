<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="/store_register" method="POST">
    @csrf
        <div class="container mt-5">
            <h1 class="mb-5">REGISTRATION</h1>
            <div class="row mt-3">
                <label for="user_name" class="form-label">User Name</label>
                <input type="text" class="form-control" name="name" id="user_name">
                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            </div>
            <div class="row mt-3">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="user_email">
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>
            <div class="row mt-3">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="user_password">
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
            </div>
            <div class="row mt-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="confirm_password">
                <span class="text-danger">@error('confirm_password'){{ $message }}@enderror</span>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <button class="btn btn-primary" type="submit">Register</button>
                    <a href="/login_form" class="btn btn-dark">login</a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
