<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @yield('styles')

    <!-- Font Awesome (pour les icônes) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(8, 133, 161, 0.733);
          /*  background-image: linear-gradient(90deg,#61a1b3,#2d8baa,#054167);*/
            color: #053348;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 20px 10px;
            transition: transform 0.4s ease;
            z-index: 1000;
        }

        .sidebar.hidden {
           width: calc(55px + 20px);
        }
        .sidebar.hidden .profile-section{
           opacity: 0;
           pointer-events: none;
        }
        .sidebar .nav-link {
            color: #307192;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            transition: background 0.3s;
        }

        .sidebar .nav-link i {
            margin-right: 10px; /* Ajout d'un espace entre l'icône et le texte */
        }

        .sidebar .nav-link:hover {
            background-color: #74b8d3;
            color: #fff;
            width: 100% ;
        }

        .sidebar .profile-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        /* Main Content */
        .main-content {
            margin-left: 0;
            width: 100%;
            background-color: #ffffff;
            transition: margin-left 0.3s ease;
        }

        .main-content.reduced {
            margin-left: 200px; /* largeur de la sidebar */
        }

        /* Toggle Button */
        .toggle-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #307192;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1100;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Styles pour les éléments du menu */
        .sidebar .nav-link span {
            display: inline-block;
            transition: opacity 0.3s ease;
        }

        /* Masquer le texte lorsque la sidebar est rétractée */
        .sidebar.hidden .nav-link span {
            opacity: 0;
            visibility: hidden;
        }

        /* Afficher le texte lorsque la sidebar est étendue */
        .sidebar.show .nav-link span {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body>

    <!-- Toggle Button -->
    <button class="toggle-btn" id="toggleBtn">&#9776;</button>

    <!-- Sidebar -->
    <div class="sidebar hidden" id="sidebar">
        <div class="profile-section">
            @auth
                <img src="{{ asset('images/catsss.png') }}" alt="User">
                <h5>{{ Auth::user()->name }}</h5>
            @else
                <h5>Bienvenue !</h5>
            @endauth
        </div>

        <nav class="nav flex-column">
            <!-- Menu items with icons -->
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a class="nav-link" href="{{ route('pets') }}">
                <i class="fas fa-paw"></i>
                <span>Buy Pets</span>
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-plus-circle"></i>
                <span>Sell Pets</span>
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-chart-line"></i>
                <span>Analytics</span>
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-headset"></i>
                <span>Contact Support</span>
            </a>

            @auth
                <a class="nav-link" href="#">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                </a>
                <a class="nav-link" href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i>
                    <span>Sign Up</span>
                </a>
            @endauth
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');

        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');  // Toggle sidebar visibility
            sidebar.classList.toggle('show');    // Toggle sidebar expanded state
            mainContent.classList.toggle('reduced');  // Reduce content width when sidebar is open
        });
    </script>
</body>

</html>
