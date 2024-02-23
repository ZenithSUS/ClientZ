<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Inactive Clients</title>
</head>
<body>
    @if(auth()->check())
    @include('/layouts/sidebar')
    @include('/layouts/header')
    <main class="container d-flex justify-content-center align-items-center flex-column" style="margin-left: 200px">
        <div class="container bg-light p-5 mt-5">
        <h1 class="text-center">Inactive Clients</h1>
        <table class="table table-striped mt-3 w-100 mx-auto text-center bg-light p-3 table-bordered table-hover table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->phone}}</td>
                    <td>
                        <form action="/admin_view_inactive_action/{{$client->id}}" method="post">
                            @csrf
                            <input type="hidden" name="client_id" value="{{$client->id}}">
                            <button type="submit" class="btn btn-primary">Restore</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center mt-3">
            <button class="btn btn-primary"><a href="/dashboard" class="text-light text-decoration-none">Go Back</a></button>
        </div>
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