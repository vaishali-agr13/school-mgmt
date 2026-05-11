<!DOCTYPE html>
<html>
<head>
    <title>School Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card shadow p-4">

                <h3 class="text-center mb-4">
                    School Login
                </h3>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="/login" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label>Email</label>

                        <input 
                            type="email" 
                            name="email" 
                            class="form-control"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label>Password</label>

                        <input 
                            type="password" 
                            name="password" 
                            class="form-control"
                            required
                        >
                    </div>

                    <button class="btn btn-primary w-100">
                        Login
                    </button>

                </form>

                <hr>

                <div class="small">

                    <p>
                        <strong>Admin Login:</strong><br>
                        admin@gmail.com / 12345678
                    </p>

                    <p>
                        <strong>Teacher Login:</strong><br>
                        teacher@gmail.com / 12345678
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>