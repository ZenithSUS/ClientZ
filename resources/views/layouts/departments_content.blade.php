<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Departments</title>
    <style>
        @media only screen and (min-width: 1024px) {
            #main {
                margin-left: 220px;
                width: calc(100% - 220px);
                margin-top: 60px;
                padding: 0 20px;
            }
        }
        @media screen and (max-width: 992px) {
            #main {
                margin-top: 120px;
                width: 100%;
                margin: 0 auto;
                padding: 0 20px;
            }
        }
        @media screen and (max-width: 768px) {
            #main {
                margin-top: 120px;
                width: 100%;
                margin: 0 auto;
                padding: 0 20px;
            }
        }
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        
        .fadeOut {
            animation: fadeOut 3s;
        }
        .description-text{
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    <main class="container d-flex justify-content-center align-items-center flex-column" id="main">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3">
            <h4 class="text-center">List of Departments</h4>
            <div class="d-flex gap-3" id="actions">
                <a href="{{ route('departments.create') }}" class="btn btn-primary">+ Add Department</a>
                <a href="/general" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="container p-5 rounded shadow rounded shadow">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h1 class="mb-3 text-center">Departments</h1>
                    <table class="table table-striped w-100">
                        @if(count($departments) > 0)
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td id="description-text">{{ $department->description }}</td>
                                <td class="d-flex gap-3">
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <div class="text-center">
                            <h3>No Department Found</h3>
                        </div>
                        @endif

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </table>
                </div>
            </div>
        </div>
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