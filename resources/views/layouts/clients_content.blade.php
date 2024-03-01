<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Content</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @media only screen and (min-width: 1024px) {
            #main {
                width: calc(100% - 220px);
                margin-left: 220px;
                margin-top: 60px;
                padding: 0 20px;
                height: calc(100vh - 60px);
                padding-bottom: 100px;
                padding-top: 60px;
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
            #actions-small{
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 10px;
                font-size: 18px;
                font-weight: 500;
                padding: 0 20px;
                margin: 0 auto;
                overflow: hidden;
            }
            table{
                margin: 0 auto;
                width: 100%;
                border: 1px solid #dee2e6;
            }
            table tr{
                padding: 5px;
                text-align: center;
                border: 1px solid #dee2e6;
                text-overflow: ellipsis;
            }
        }
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        
        .fadeOut {
            animation: fadeOut 3s;
        }
    </style>
</head>
<body>
    <main class="container d-flex justify-content-center align-items-center flex-column" id="main">
        <div class="container text-center mt-3 d-flex justify-content-center align-items-center flex-column bg-light rounded shadow p-3">
            <h1 class="text-center">Clients</h1>
            <table class="table table-striped table-hover table-bordered table-responsive mt-3 text-center mx-auto mb-4">
                @if(count($clients) > 0)
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
                @else
                    <h3 class="text-center text-danger">No clients found</h3>
                @endif
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
                <td id="actions-small">
                    <button class="btn btn-primary"><a href="{{route('admin_view_inactive')}}" class="text-light text-decoration-none">View Inactive Clients</a></button>
                    <button class="btn btn-primary"><a href="{{route('admin_sort')}}" class="text-light text-decoration-none">Sort Clients by Last Name</a></button>
                    <button class="btn btn-primary"><a href="{{route('admin_sort_email')}}" class="text-light text-decoration-none">Sort Clients by Email</a></button>
                </td>
            </tr>
    </table>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            setTimeout(function() {
                successMessage.classList.add('fadeOut');
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 1000); // 1 second to fade out
            }, 3000); // 3 seconds to display
        }
    });
</script>
</body>
</html>