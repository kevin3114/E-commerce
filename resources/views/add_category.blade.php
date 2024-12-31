<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD CATEGORY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>ADD CATEGORY</h1>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="row mt-5">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control" placeholder="Enter Category" name="category_name">
                <span class="text-danger"> @error('category_name') {{ $message }} @enderror </span>
            </div>
            <button class="btn btn-primary btn-sm mt-3">Add Category</button>
        </form>
    </div>
</body>

</html>
    