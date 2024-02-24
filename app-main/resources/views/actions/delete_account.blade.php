<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @media screen and (max-width: 600px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
    <title>Delete Account</title>
</head>
<body>
    @if(auth()->check())
    @include('/layouts/sidebar')
    @include('/layouts/header')
    <main class="container text-center d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh; margin-left: 220px">
    <div class="container text-center p-5 bg-light rounded shadow p-3 mb-5 w-50">
        <h1>Delete Account</h1>
        <p class="lead">Are you sure you want to delete your account?</p> 
        <p class="text-danger">This action cannot be undone</p>
        <form action="/delete_account_action" method="post">
            @csrf
            <div class="container d-flex justify-content-center align-items-center gap-3">
                <button class="btn btn-danger" type="submit">Confirm Delete</button>
            </div>
        </form>
        <button class="btn btn-primary"><a href="/dashboard" class="text-light text-decoration-none">Go Back</a></button> 
    </div>
    </main>
    @else
    <script>
        alert("Sesssion Expired. Login Again");
        window.location.href = "/";
    </script>
    @endif
</body>
</html>