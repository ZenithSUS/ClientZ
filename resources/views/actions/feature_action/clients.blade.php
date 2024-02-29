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
    </style>
    <title>Clients</title>
</head>
<body>
    @if(auth()->check())
    @include('/layouts/sidebar')
    @include('/layouts/header')
    @include('/layouts/clients_content')
    @else
    <script>
        alert("Sesssion Expired. Login Again");
        window.location.href = "/";
    </script>
    @endif
</body>
</html>