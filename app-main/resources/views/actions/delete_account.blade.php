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
    <main class="container text-center mt-5" style="margin-left: 200px">
    <div class="container mt-5 text-center p-5 bg-light rounded shadow p-3 mb-5 w-50">
        <h1>Delete Account</h1>
        <p class="lead">Are you sure you want to delete your account?</p>
        <form action="/delete_account_action" method="post">
            @csrf
            <div class="container d-flex justify-content-center align-items-center gap-3">
                <button class="btn btn-primary" type="submit">Yes</button>
                <button class="btn btn-primary"><a href="/dashboard" class="text-light text-decoration-none">No</a></button>
            </div>
        </form>
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