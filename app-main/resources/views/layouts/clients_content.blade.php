<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Content</title>
</head>
<body>
    <main class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;  margin-left: 220px">
        <h1 class="text-center">Client</h1>
        <div class="container mt-3 d-flex justify-content-center align-items-center">
            <table class="table table-striped table-hover table-bordered mt-3 text-center w-75 mx-auto">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->phone}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>