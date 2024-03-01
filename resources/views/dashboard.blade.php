
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @media screen and (max-width: 768px) {
          .dashboard-content{
            font-size: 10px;
            text-align: start;
            width: 100%;
            padding: 20px 20px;
          }
          #dashboard-column{
            display: flex;
            flex-direction: column;
          }
          section{
            margin-top: 120px;
            width: 100%;
            margin: 0 auto;
          }
          .box-content{
            width: 50%;
            padding: 10px;
            margin: 0 auto;
          }
        }
        @media screen and (max-width: 992px) {
          .dashboard-content{
            font-size: 14px;
            text-align: center;
            width: 100%;
          }
          section{
            margin-top: 120px;
            width: 100%;
            margin: 0 auto;
            padding: 0 20px;
            overflow-y: auto;
            height: calc(100vh - 120px);
            padding-bottom: 100px;
            padding-top: 60px;
            align-items: center;
          }
          .box-content{
            width: 50%;
            padding: 10px;
          }
        }
        @media only screen and (min-width: 1024px) {
          #main{
            margin-left: 220px;
            width: calc(100% - 220px);
            margin-top: 60px;
          }
          .section{
            width: calc(100% - 220px);
            margin-top: 60px;
            padding: 0 20px;
          }
          .dashboard-content{
            font-size: 20px;
            text-align: start;
          }
          .box-content{
            width: 400px;
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
    <title>Dashboard</title>
</head>
<body>
@include('/layouts/sidebar')
@include('/layouts/header')
<main class="container text-center p-3 d-flex flex-column justify-content-center align-items-center" id="main">
<h3 class="text-dark fw-bold">Welcome {{auth()->user()->name}}</h3>

<section class="container mt-3 d-flex justify-content-center align-items-center bg-light rounded shadow p-3 flex-column w-100">
  <h1>Dashboard</h1>
  <div class="container d-flex align-items-center mt-3" id="dashboard-columns">
    <div class="bg-info rounded p-5 box-content col mx-3 text-white h-100">
      <h1 class="dashboard-content">Clients <br> {{$total_clients}}</h1>
    </div>
    <div class="bg-success rounded p-5 box-content col mx-3 text-white h-100">
      <h1 class="dashboard-content">Active Clients <br> {{$active_clients}}</h1>
    </div>
    <div class="bg-warning rounded p-5 box-content col mx-3 text-white h-100">
      <h1 class="dashboard-content">Inactive Clients <br> {{$inactive_clients}}</h1>
    </div>
  </div>
  <div class="container d-flex align-items-center mt-3" id="dashboard-columns">
    <div class="rounded p-5 box-content col mx-3" style="background-color: darkblue; color: white">
      <h1 class="dashboard-content">Departments <br> {{$total_departments}}</h1>
    </div>
    <div class="rounded p-5 box-content col mx-3" style="background-color: darkred; color: white">
      <h1 class="dashboard-content">Total Companies <br> {{$total_companies}}</h1>
    </div>
    <div class="rounded p-5 box-content col mx-3" style="background-color: darkgreen; color: white">
      <h1 class="dashboard-content">Total Income <br> N/A</h1>
    </div>
  </div>
</section>


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