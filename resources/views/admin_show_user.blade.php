<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USERS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>@include('admin_navbar')</div>
    <div class="container mt-5">
        <h1 class="mb-4">Users</h1>
        <table class="table table-hover">
            <thead class="bg-dark text-light">
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userData as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
