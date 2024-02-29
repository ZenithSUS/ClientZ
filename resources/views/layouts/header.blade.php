<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @media only screen and (min-width: 1024px) {
            .header {
                background-color: #f8f9fa;
                border-bottom: 1px solid #e9ecef;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
                height: 60px;
                width: calc(100% - 220px);
                padding: 0 20px;
                top: 0;
                z-index: 1;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 10px;
                font-size: 18px;
                font-weight: 500;
                margin-top: 0;
                margin-bottom: 0;
                padding: 0;
                overflow: hidden;
                float: left;
                margin-left: 220px;
            }
        }
        @media screen and (max-width: 992px) {
            .header {
                width: 100%;
                background-color: #f8f9fa;
                border-bottom: 1px solid #e9ecef;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
                height: 60px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
        }
        @media screen and (max-width: 768px) {
            .header {
                width: 100%;
                background-color: #f8f9fa;
                border-bottom: 1px solid #e9ecef;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
                height: 60px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

        }
    </style>
    <title>Navbar</title>
</head>
<body>
<nav class="header mb-3 p-3">
        <div class="ml-2 p-3">
            <h2 class="fw-bold text-dark mb-0 text-decoration-none">Admin Dashboard</h2>
        </div>
        <div class="d-flex align-items-center gap-3" style="">
            <a href="/logout" class="text-decoration-none text-dark">Logout</a>
            <a href="/admin_profile" class="text-decoration-none text-dark">Profile</a>
        </div>
    </nav>
</body>
</html>