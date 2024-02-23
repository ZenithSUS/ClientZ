<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <main class="container mt-3 d-flex justify-content-center align-items-center flex-column h-100 p-2">
        <div class="container mt-3 d-flex justify-content-center align-items-center flex-column mx-auto w-50 bg-light p-5">
        <h1 class="text-center">Login Page</h1>
        <form action="/user_login_action" method="post" class="container mt-3 d-flex justify-content-center align-items-center flex-column p-3">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="container mt-3 d-flex justify-content-center align-items-center gap-3">
                <a href="/register" class="btn btn-primary">Register</a>
                <a href="/forgot_password" class="btn btn-primary">Forgot Password</a>
                <a href="/" class="btn btn-primary">Home</a>
            </div>
        </form>
        </div>
    </main>   
</body>
</html>