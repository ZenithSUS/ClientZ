<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Add Client</title>
    <style>
        @media only screen and (min-width: 1024px) {
            #main {
                width: calc(100% - 220px);
                margin-left: 220px;
                padding: 0 20px;
                padding-bottom: 100px;
                padding-top: 60px;
                margin-top: 60px;
            }
        }
        @media screen and (max-width: 768px) {
            #main {
                margin-top: 120px;
                width: 100%;
                margin: 0 auto;
                padding: 0 20px;
                padding-bottom: 100px;
                padding-top: 60px;
                overflow-y: auto;
            }
        }
    </style>
</head>
<body>
    @auth
    @include('/layouts/sidebar')
    @include('/layouts/header')
    <main class="container d-flex justify-content-center align-items-center flex-column" id="main">
    <div class="container p-5 rounded shadow rounded shadow w-75">
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
                        <label for="company">Company</label>
                        <select type="text" id="company" name="company" class="form-control" value="{{ old('company') }}">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                        </select>
                        <span class="text-danger">@error('company'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="department">Department</label>
                        <select type="text" id="department" name="department" class="form-control" value="{{ old('department') }}">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                        </select>
                        <span class="text-danger">@error('department'){{ $message }}@enderror</span>
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