<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Edit Client</title>
    <style>
        @media only screen and (min-width: 1024px) {
            #main{
                margin-left: 220px;
                width: calc(100% - 220px);
                margin-top: 60px;
            }
        }
        @media screen and (max-width: 768px) {
            #main{
                width: 100%;
                margin-top: 60px;
            }
        }
    </style>
</head>
<body>
@if(auth()->check())
    @include('/layouts/sidebar')
    @include('/layouts/header')
    <main class="container p-3 rounded shadow d-flex flex-column justify-content-center align-items-center" id="main">
    <div class="container mb-5 p-5 bg-light rounded shadow w-75 mx-auto rounded shadow">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="mb-4 text-center text-bold">Edit Client</h1>
                <form action="/edit_client_action/{{$client->id}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{$client->first_name}}">
                        <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{$client->middle_name}}">
                        <span class="text-danger">@error('middle_name'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{$client->last_name}}">
                        <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{$client->email}}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{$client->phone}}">
                        <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="company">Company</label>
                        <select name="company_id" id="company" class="form-control">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}" @if($company->id == $client->company_id) selected @endif>{{$company->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('company'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Department">Department</label>
                        <select name="department_id" id="department" class="form-control">
                            @foreach($departments as $department)
                                <option value="{{$department->id}}" @if($department->id == $client->department_id) selected @endif>{{$department->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('department'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Client</button>
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