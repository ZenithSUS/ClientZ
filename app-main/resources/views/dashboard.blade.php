
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            background-color: #f8f9fa;
        }
        /* For small devices (phones) */
        @media only screen and (max-width: 600px) {
          /* Add your responsive styles for small devices here */
          body {
              font-size: 14px;
          }
          h1 {
              font-size: 24px;
          }
          /* Add more specific styles for small devices as needed */
        }
        
        /* For medium devices (tablets) */
        @media only screen and (min-width: 601px) and (max-width: 1024px) {
          /* Add your responsive styles for medium devices here */
          body {
              font-size: 16px;
          }
          h1 {
              font-size: 28px;
          }
          /* Add more specific styles for medium devices as needed */
        }
        
        /* For large devices (laptops/desktops) */
        @media only screen and (min-width: 1025px) {
          /* Add your responsive styles for large devices here */
          body {
              font-size: 18px;
          }
          h1 {
              font-size: 32px;
          }
          /* Add more specific styles for large devices as needed */

        }
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        
        .fadeOut {
            animation: fadeOut 3s;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
@if(auth()->check())
    @include('/layouts/sidebar')
    @include('/layouts/header')
<main class="container text-center p-3 rounded shadow d-flex flex-column justify-content-center align-items-center" style="margin-left: calc(220px + 20px); margin-top: 60px">
<h3 class="text-dark fw-bold">Welcome {{auth()->user()->name}}</h3>
<div class="container text-center mt-3 d-flex justify-content-center align-items-center flex-column bg-light rounded shadow p-3 w-100">
  <h1 class="text-center">Clients</h1>
<table class="table table-striped table-hover table-bordered mt-3 text-center w-50 mx-auto mb-4">
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
            <button class="btn btn-primary"><a href="/admin_add" class="text-light text-decoration-none">Add Client</a></button>
            <button class="btn btn-primary"><a href="{{route('admin_view_inactive')}}" class="text-light text-decoration-none">View Inactive Clients</a></button>
            <button class="btn btn-primary"><a href="{{route('admin_sort')}}" class="text-light text-decoration-none">Sort Clients by Last Name</a></button>
            <button class="btn btn-primary"><a href="{{route('admin_sort_email')}}" class="text-light text-decoration-none">Sort Clients by Email</a></button>
        </td>
    </tr>
</table>

<section class="container text-center mt-3 d-flex justify-content-center align-items-center bg-light rounded shadow p-3 flex-column">
<h1 class="text-center">Client Statistics</h1>
<div class="container text-center mt-3 d-flex justify-content-center align-items-center">
  <div class="row bg-secondary p-3 m-3 rounded d-flex justify-content-center">
    <h1 class="text-center mt-3 mb-3">Population of Clients</h1>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Clients</h5>
            <p class="card-text text-primary text-center text-bold fs-1">{{$total_clients}}</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Active Clients</h5>
            <p class="card-text text-success text-center text-bold fs-1">{{$active_clients}}</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Inactive Clients</h5>
            <p class="card-text text-danger text-center text-bold fs-1">{{$inactive_clients}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row bg-secondary p-3 m-3 rounded d-flex justify-content-center align-items-center">
    <h1 class="text-center mt-3 mb-3">Completed Projects</h1>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Projects</h5>
            <p class="card-text text-primary text-center text-bold fs-1">0</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Completed Projects</h5>
            <p class="card-text text-success text-center text-bold fs-1">0</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Incomplete Projects</h5>
            <p class="card-text text-danger text-center text-bold fs-1">0</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container text-center mt-3 d-flex justify-content-center align-items-center">
  <div class="row bg-secondary p-3 m-3 rounded d-flex justify-content-center align-items-center">
    <h1 class="text-center mt-3 mb-3">Monthly Revenue</h1>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">January</h5>
            <p class="card-text text-primary text-center text-bold fs-1">100</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">February</h5>
            <p class="card-text text-primary text-center text-bold fs-1">100</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">March</h5>
            <p class="card-text text-primary text-center text-bold fs-1">100</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</main>


@else
    <script>
        alert("Sesssion Expired. Login Again");
        window.location = "/";
    </script>
    @endif
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