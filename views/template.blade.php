<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark px-3 d-flex justify-content-between">

    <a class="navbar-brand text-white" href="/products">
        Ecommerce App
    </a>

    @auth

        <div class="d-flex align-items-center gap-2">

            <span class="text-white">

                {{ Auth::user()->name }}

            </span>

            <a href="/logout" class="btn btn-danger btn-sm">

                Logout

            </a>

        </div>

    @endauth

</nav>

    @yield('content')

    <footer class="text-center mt-5 mb-3 text-muted">
        CRUD Laravel - Rakha Arbiyandanu - 2311102263
    </footer>

</body>

</html>