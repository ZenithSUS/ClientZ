<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @media screen and (max-width: 768px) {
            .sidebar {
                display: none;
                width: 100%;
            }
            .sidebar a {
                display: none;
                width: 100%;
            }
        }

        @media screen and (max-width: 992px) {
            .sidebar {
                display: none;
                width: 100%;
            }
        }
       
        @media screen and (min-width: 1024px) {
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 220px;
            background-color: #f8f9fa;
            padding: 20px;
            border-right: 1px solid #dee2e6;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            z-index: 999;
            overflow-y: auto;
            transition: transform 0.3s ease-in-out;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease-in-out;
        }
        .sidebar a:hover {
            background-color: #dee2e6;
        }
    }
    </style>
    <title>Navbar</title>
</head>
<body>
<main class="sidebar" style="background-color: #B284BE;">
<nav class="mb-3">
        <h2 class="fw-bold text-dark mb-0 text-decoration-none p-3">ClientZ</h2>
        <h4 class="fw-bold">Application</h4>
        <div class="d-flex align-items-center gap-3 ms-2" style="margin-right: 20px;">
        <ul class="sidebar-nav mt-2 mb-2 ms-2 list-unstyled d-flex flex-column fw-bold">
            <li><a href="/dashboard" class="text-decoration-none text-dark">&#9751; Dashboard</a></li>
            <li><a href="/clients" class="text-decoration-none text-dark">&#9756; Clients</a></li>
            <li><a href="{{ route('add') }}" class="text-decoration-none text-dark">&#9755; Add Client</a></li>
            <li><a href="/general" class="text-decoration-none text-dark">&#8486; General Management</a></li>
        </ul>
        </div>
        <h4 class="fw-bold">Settings</h4>
        <div class="d-flex align-items-center gap-3 ms-2" style="margin-right: 20px; white-space: nowrap">
        <ul class="sidebar-nav mt-2 mb-2 ms-2 list-unstyled d-flex flex-column fw-bold">
            <li><a href="/changepassword" class="text-decoration-none text-dark">&#9881; Change Password</a></li>
            <li><a href="/delete_account" class="text-decoration-none text-dark">&#10006; Delete Account</a></li>
        </ul>
        </div>
    </nav>
</main>
</body>
</html>