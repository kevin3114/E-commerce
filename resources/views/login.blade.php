<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Login</h1>
        <form action="/login" method="POST">
        @csrf
            <div class="row mt-5">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>
            <div class="row">
                <label for="password" class="form-label mt-3">password</label>
                <input type="password" class="form-control " name="password" id="password">
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-5">Login</button>
                <a href="/" class="btn btn-dark mt-5">Register</a>
            </div>
        </form>
    </div>
</body>
</html>