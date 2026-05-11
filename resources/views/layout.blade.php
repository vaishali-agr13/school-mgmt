<!DOCTYPE html>
<html>
<head>
    <title>School Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-2 bg-dark text-white min-vh-100 p-3">

            <h3 class="mb-4">School Panel</h3>

            <ul class="nav flex-column">

                <li class="nav-item mb-2">
                    <a href="/dashboard" class="nav-link text-white">Dashboard</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/students" class="nav-link text-white">Students</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/attendance" class="nav-link text-white">Attendance</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/fees" class="nav-link text-white">Fees</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/homework" class="nav-link text-white">Homework</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/notices" class="nav-link text-white">Notices</a>
                </li>

                <li class="nav-item mt-4">
                    <a href="/logout" class="btn btn-danger w-100">Logout</a>
                </li>

            </ul>

        </div>

        <div class="col-md-10 p-4">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>