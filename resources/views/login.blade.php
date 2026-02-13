<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle, #020617, #020617, #0f172a);
        }

    </style>

</head>

<body>

    <div class="login-card col-md-2 ">

        <h2 class="text-center mb-4">🎬 Movie Login</h2>

        <form method="POST" action="/login">
            {{ csrf_field() }}

            <div class="form-group">
                <input class="form-control" name="username" placeholder="Username" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <button class="btn btn-elegant btn-block" data-lang="login">
                Login
            </button>

            <label class="mt-3">
                <input type="checkbox" name="remember">
                Remember Me
            </label>

            @if(session('notification'))
            <script>
                showToast("{{ session('notification') }}", "info");

            </script>
            @endif

            @if(session('error'))
            <script>
                showToast("{{ session('error') }}", "error");

            </script>
            @endif
        </form>

    </div>


</body>

</html>
