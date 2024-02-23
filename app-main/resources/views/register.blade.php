<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Register</title>
    <style>
        body {
            background-color: #f2f2f2;
        }
        @media (max-width: 576px) {
            .container {
                max-width: 100%;
                padding: 20px;
                margin: 0;
                border-radius: 0;
                box-shadow: none;
                background-color: transparent;
                border: none;
            }
            .form-group {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5 p-5 bg-light rounded shadow w-50 mx-auto rounded shadow">
        <div class="row">
        <a href="/"><button class="btn btn-primary">Go Back</button></a>
            <div class="col-md-6 offset-md-3">
                <h1 class="mb-3 text-center">Register</h1>
                <form action="/register_action" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        <span class="text-danger">@error('email_exist'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                        <span class="text-danger">@error('password_not_match'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                        @if (session('password_not_match'))
                            <span class="text-danger">{{ session('password_not_match') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#password, #password_confirmation').on('keyup', function() {
            if ($('#password').val() == $('#password_confirmation').val()) {
                $('#password_not_match').html('');
            }
            else{
                $('#password_not_match').html('Password not match');
            }
        })
        if($('#name').val() == ''){
            $('#name').focus();
        }
        else{
            $('#email').focus();
        }  
    })
</script>
</html>