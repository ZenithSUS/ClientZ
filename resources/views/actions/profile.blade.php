<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Profile</title>
</head>
<body>
@if(auth()->check())
    @include('/layouts/sidebar')
    @include('layouts.header')
    <main class="mt-5">
    <div class="container text-center mt-5 p-5 bg-light rounded shadow mb-5 w-50 rounded shadow d-flex flex-column justify-content-center align-items-center">
        <h1 class="mb-4 text-center text-bold">Profile</h1>
        <div>
            <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile Photo" class="rounded-circle" width="200" height="200">
        </div>
        <div>
            <h2>Name: {{ Auth::user()->name }}</h2>
            <p>Email: {{ Auth::user()->email }}</p>
        </div>
        <a href="/logout" class="btn btn-primary">Logout</a>
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