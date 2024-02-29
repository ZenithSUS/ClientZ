
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
        @media only screen and (min-width: 600px) {
          /* Add your responsive styles for small devices here */
          body {
              font-size: 14px;
          }
          h1 {
              font-size: 24px;
          }
          main{
              margin-left: 0;
              margin-top: 60px;
              min-height: 100vh;
              padding: 20px;
              background-color: #f8f9fa;
              border-radius: 8px;
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
          main {
              margin-left: 220px;
              margin-top: 60px;
              min-height: 100vh;
              padding: 20px;
              background-color: #f8f9fa;
              border-radius: 8px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
<main class="container text-center p-3 rounded shadow d-flex flex-column justify-content-center align-items-center" style="margin-left: 220px; min-height: 100vh; margin-top: 60px;">
<h3 class="text-dark fw-bold">Welcome {{auth()->user()->name}}</h3>

<section class="container mt-3 d-flex justify-content-center align-items-center bg-light rounded shadow p-3 flex-column">
  <h1>Dashboard</h1>
  <div class="container d-flex justify-content-between align-items-center flex-wrap w-100 mt-3" style="white-space: nowrap">
    <div class="bg-info rounded p-5 text-start w-25 col mx-3 text-white h-100">
      <h1>Clients <br> {{$total_clients}}</h1>
    </div>
    <div class="bg-success rounded p-5 text-start w-25 col mx-3 text-white h-100">
      <h1>Active Clients <br> {{$active_clients}}</h1>
    </div>
    <div class="bg-warning rounded p-5 text-start w-25 col mx-3 text-white h-100">
      <h1>Inactive Clients <br> {{$inactive_clients}}</h1>
    </div>
  </div>
  <div class="container d-flex justify-content-between align-items-center w-100 mt-3" style="white-space: nowrap">
    <div class="rounded p-5 text-start w-25 col mx-3" style="background-color: darkblue; color: white">
      <h1>Departments <br> 10</h1>
    </div>
    <div class="rounded p-5 text-start w-25 col mx-3" style="background-color: darkred; color: white">
      <h1>Total Payment <br> N/A</h1>
    </div>
    <div class="rounded p-5 text-start w-25 col mx-3" style="background-color: darkgreen; color: white">
      <h1>Total Income <br> N/A</h1>
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