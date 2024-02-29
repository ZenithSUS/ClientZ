<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin Sign in</title>
</head>
<body>
<!-- Section: Design Block -->
<section class=" text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @keyframes fadeOut {
      from { opacity: 1; }
      to { opacity: 0; }
    }

    .fadeOut {
      animation: fadeOut 3s;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
    /* For small screens */
    @media (min-width: 300px) and (max-width: 767px) {
      .col-lg-4 {
        width: 100%; /* Change the width for small screens */
        margin-bottom: 10px; /* Add some bottom margin for better spacing */
      }
      .img-fluid {
        margin-bottom: 10px; /* Add some bottom margin for better spacing */
      }
    }
  </style>
  <div class="card mb-3" style="bg-color: #f5f5f5">
    <div class="row g-0 d-flex align-items-center justify-content-center rounded rounded-t-5">
      <div class="col-lg-4 d-lg-flex d-none">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Header Image"
          class="d-block img-fluid w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5">
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">
            <h4 class="mb-4">Admin Sign in</h4>
          <form action="/login" method="post">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form2Example1" class="form-control" name="loginemail" />
              <label class="form-label" for="form2Example1">Email address</label><br>
              <span class="text-danger">@error('loginemail'){{ $message }}@enderror</span>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form2Example2" class="form-control" name="loginpassword" />
              <label class="form-label" for="form2Example2">Password</label><br>
              <span class="text-danger">@error('loginpassword'){{ $message }}@enderror</span>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                  <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
              </div>

              <!-- Register buttons -->
              <div class="col">
                <p>Don't have an account? <a href="/register">Register</a></p>
              </div>

              <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
              </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            @if (session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @elseif (session('success'))
                <div class="alert alert-success" id="Message">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" id="Message">
                    {{ session('error') }}
                </div>
            @endif
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
<script>
  // Hide success message after 3 seconds
  document.addEventListener("DOMContentLoaded", function() {
        var successMessage = document.getElementById('Message');
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