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
    <title>Change Password</title>
</head>
<body>
    @if(auth()->check())
    @include('/layouts/sidebar')
    @include('/layouts/header')
    <main class="container mt-5">
        
    <div class="container mt-5 p-5 bg-light rounded shadow mb-5 w-50 rounded shadow d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center">Change Password</h1>
        <form action="/change_password_action" method="post" class="container mt-3 d-flex justify-content-center align-items-center flex-column bg-light p-3">
            @csrf
            <div class="form-group mb-3">
                <label for="old_password">Old Password</label>
                <input type="password" name="old_password" id="old_password" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Change Password</button>
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