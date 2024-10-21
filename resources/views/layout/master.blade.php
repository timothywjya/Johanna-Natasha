<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom CSS -->
    <style>
        /* Color palette Winnie the Pooh */
        .navbar {
            background-color: #FFD57E;
            /* Pooh yellow */
        }

        .navbar-brand {
            color: #A52A2A !important;
            /* Pooh's red shirt */
        }

        .navbar-nav .nav-link {
            color: #A52A2A !important;
            /* Red links */
        }

        .navbar-toggler {
            color: #FFF !important;
            /* White for contrast */
        }

        .btn-logout {
            background-color: #A52A2A;
            color: white;
            border-color: #A52A2A;
        }

        .btn-logout:hover {
            background-color: #8B0000;
            /* Darker red on hover */
        }
    </style>
    @stack('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Johanna Natasha Agaatsz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">User Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Role Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Content Management</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-light text-center text-lg-start mt-auto">
        <div class="text-center p-3">
            © 2024 Your Company Name
        </div>
    </footer>

    <!-- Bootstrap JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Custom Scripts -->
    @stack('scripts')

</body>

</html>