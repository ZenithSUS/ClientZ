<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Add Client</title>
</head>
<body>
    @auth
    @include('/layouts/sidebar')
    @include('/layouts/header')
    <main>
    <div class="container mt-5 mb-5 p-5 rounded shadow w-50 mx-auto rounded shadow" style="background-color: #f8f9fa">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="mb-3 text-center">Add Client</h1>
                <form action="/add_client_action" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}">
                        <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{ old('middle_name') }}">
                        <span class="text-danger">@error('middle_name'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}">
                        <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                        <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="/dashboard" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
    @else
    <script>
        alert("Sesssion Expired. Login Again");
        window.location = "/";
    </script>
    @endif
</body>
</html>