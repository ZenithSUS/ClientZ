<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <title>Create Department</title>
    <style>
        @media only screen and (min-width: 1024px) {
            #main {
                margin-left: 220px;
                width: calc(100% - 220px);
                margin-top: 60px;
                padding: 0 20px;
                padding-bottom: 100px;
            }
        }
        @media screen and (max-width: 992px) {
            #main {
                margin-top: 120px;
                width: 100%;
                margin: 0 auto;
                padding: 0 20px;
            }
        }
        @media screen and (max-width: 768px) {
            #main {
                margin-top: 120px;
                width: 100%;
                margin: 0 auto;
                padding: 0 20px;
            }
        }
    </style>
</head>
<body>
    @include('/layouts/sidebar')
    @include('/layouts/header')
    <main class="container d-flex justify-content-center align-items-center flex-column" id="main">
        <div class="container p-5 rounded shadow rounded shadow w-75">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h1 class="mb-3 text-center">Create Department</h1>
                    <form action="{{ route('departments.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}">
                            <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="company_id">Company</label>
                            <select name="company_id" id="company_id" class="form-control">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('company_id'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group mb-3 d-flex justify-content-start align-items-center gap-3">
                            <button type="submit" class="btn btn-primary">Create Department</button>
                            <a href="/general" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>