<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Content</title>
</head>
<body>
    <main class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;  margin-left: 220px">
        <div class="container text-center mt-3 d-flex justify-content-center align-items-center flex-column bg-light rounded shadow p-3 w-100">
            <h1 class="text-center">Clients</h1>
            <table class="table table-striped table-hover table-bordered table-responsive mt-3 text-center w-50 mx-auto mb-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First</th>
                        <th scope="col">Middle</th>
                        <th scope="col">Last</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <th scope="row">{{$client->id}}</th>
                            <td>{{$client->first_name}}</td>
                            <td>{{$client->middle_name}}</td>
                            <td>{{$client->last_name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->phone}}</td>
                            <td class="d-flex justify-content-center align-items-center gap-2"><button class="btn btn-primary"><a href="/admin_edit/{{$client->id}}" class="text-light text-decoration-none">Edit</a></button> 
                                <button class="btn btn-danger"><a href="/admin_delete/{{$client->id}}" class="text-light text-decoration-none">Delete</a></button>
                                <button class="btn btn-primary"><a href="/admin_view/{{$client->id}}" class="text-light text-decoration-none">View</a></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (session('success'))
                <div id="successMessage" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>


    <table class="table table-striped table-hover table-bordered mt-3 text-center w-75 mx-auto mb-4">
        <thead>
            <tr>
                <th scope="col text-center">Admin Actions</th>
            </tr>
        </thead>
            <tr>
                <td>
                    <button class="btn btn-primary"><a href="{{route('admin_view_inactive')}}" class="text-light text-decoration-none">View Inactive Clients</a></button>
                    <button class="btn btn-primary"><a href="{{route('admin_sort')}}" class="text-light text-decoration-none">Sort Clients by Last Name</a></button>
                    <button class="btn btn-primary"><a href="{{route('admin_sort_email')}}" class="text-light text-decoration-none">Sort Clients by Email</a></button>
                </td>
            </tr>
    </table>
</main>
</body>
</html>