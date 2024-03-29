<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @media only screen and (min-width: 1024px) {
            #main {
               margin-left: 220px;
               width: calc(100% - 220px);
               padding: 20px;
               overflow-y: auto; 
            }
        }
        @media screen and (max-width: 992px) {
            #main {
                width: 100%;
                padding: 20px;
                overflow-y: auto;
            }
        }
    </style>
</head>
<body>
    @if(auth()->check())
    @include('/layouts/sidebar')
    @include('/layouts/header')
    <main class="container d-flex justify-content-center align-items-center flex-column" id="main">
        <h1 class="text-center">Client Details</h1>
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
                    <tr>
                        <td>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->phone}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="/dashboard" class="btn btn-primary mt-3">Go Back to Dashboard</a>
    </main>
    @else
    <script>
        alert("Sesssion Expired. Login Again");
        window.location.href = "/";
    </script>
    @endif
</body>
</html>