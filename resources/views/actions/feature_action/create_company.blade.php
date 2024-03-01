<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Create Company</title>
    <style>
        @media only screen and (min-width: 1024px) {
            #main {
                margin-left: 220px;
                width: calc(100% - 220px);
                margin-top: 60px;
                padding: 0 20px;
            }
            #form{
                width: 60%;
                margin: 0 auto;
                padding: 0 20px;
            }
        }
        @media screen and (max-width: 992px) {
            #main {
                margin-top: 120px;
                width: 100%;
                margin: 0 auto;
                padding: 0 20px;
            }
            #form{
                width: 100%;
                margin: 0 auto;
            }
        }
        @media screen and (max-width: 768px) {
            #main {
                margin-top: 120px;
                width: 100%;
                margin: 0 auto;
                padding: 0 20px;
            }
            #form{
                width: 100%;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>
    @include('/layouts/sidebar')
    @include('layouts.header')
    <main class="container d-flex justify-content-center align-items-center flex-column" id="main">
        <div class="container p-5 rounded shadow rounded shadow" id="form">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h1 class="mb-3 text-center">Create Company</h1>
                    <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
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
                        </div>
                        <div class="form-group mb-3">
                            <label for="website">Website</label>
                            <input type="text" id="website" name="website" class="form-control" value="{{ old('website') }}">
                            <span class="text-danger">@error('website'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group mb-3 d-flex justify-content-start gap-3">
                            <button type="submit" class="btn btn-primary">Create Company</button>
                            <a href="/general" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main> 
</body>
</html>