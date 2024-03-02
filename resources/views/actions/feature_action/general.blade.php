<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>General Action</title>
    <style>
        @media only screen and (min-width: 1024px) {
            #main {
               width: calc(100% - 220px);
               margin-left: 220px;
               margin-top: 60px;
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
        }
        @media screen and (max-width: 768px) {
            #main {
                margin-top: 120px;
                width: 100%;
                margin: 0 auto;
                padding: 0 20px;
            }
        }
        .description-text{
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    @include('/layouts/sidebar')
    @include('layouts.header')
    <main class="container d-flex justify-content-center align-items-center flex-column" id="main">
    <h1 class="mb-4 text-center text-bold">General Management</h1>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="text-center mt-3 p-5 bg-light rounded shadow mb-5 w-100 rounded shadow d-flex justify-content-between">
            <div class="w-50 d-flex justify-content-between mx-3">
                <h3 class="text-center">Departments: {{ $data['department'] }}</h3>
                <button class="btn btn-primary w-25">
                    <a href="{{ route('departments.view') }}" class="text-white text-decoration-none">View</a>
                </button>
            </div>
            <div class="w-50 d-flex justify-content-between mx-3">
                <h3 class="text-center">Companies: {{ $data['companies'] }}</h3>
                <button class="btn btn-primary w-25">
                    <a href="{{ route('companies.view') }}" class="text-white text-decoration-none">View</a>
                </button>
            </div>
        </div>
    </div>

    <section id="actions-small" class="d-flex justify-content-center align-items-center flex-column w-100">
    <div class="container rounded shadow p-5 mb-5">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h4 class="text-center">List of Departments</h4>
            <a href="{{ route('departments.create') }}" class="btn btn-primary">+ Add Department</a>
        </div>
    <table class="table table-striped table-hover table-bordered table-responsive mt-3 text-center mx-auto mb-4 w-100">
        @if(count($departments) > 0)
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr class="align-middle">
                <td>{{ $department->name }}</td>
                <td id="description-text">{{ $department->description }}</td>
            </tr>
            @endforeach
        </tbody>
        @else
        <tr>
            <td colspan="2" class="text-center text-danger"><h2>No departments found</h2></td>
        </tr>
        @endif
    </table>
    </div>

    <div class="container rounded shadow p-5">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h4 class="text-center">List of Companies</h4>
            <a href="{{ route('companies.create') }}" class="btn btn-primary">+ Add Company</a>
        </div>
    <table class="table table-striped table-hover table-bordered table-responsive mt-3 text-center text-wrap mx-auto mb-4">
        @if(count($companies) > 0)
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr class="align-middle">
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
            </tr>
            @endforeach
        </tbody>
        @else
        <tr>
            <td colspan="2" class="text-center text-danger"><h2>No companies found</h2></td>
        </tr>
        @endif
    </table>
    </div>

    </section>
    </main>
</body>
</html>