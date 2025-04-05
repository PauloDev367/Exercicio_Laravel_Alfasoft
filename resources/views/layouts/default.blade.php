<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercício Laravel Alfasoft</title>

    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <script src="/assets/bootstrap/js/jquery-3.7.1.min.js"></script>

    {{-- ICONS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CUSTOM --}}
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>

<body>
    @if (auth()->user())
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">
                <img src="https://www.alfasoft.pt/assets/images/logo.png" class="w-100" alt="Logo Alfasoft">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form action="{{ route('logout') }}" class="ml-auto" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="fa-solid fa-person-walking-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </nav>
    @endif

    @yield('content')


    {{-- BOOTSRAP --}}
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
