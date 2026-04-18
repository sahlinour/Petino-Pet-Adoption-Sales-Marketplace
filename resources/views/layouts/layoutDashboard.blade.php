{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            min-height: 100vh;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
        }

        /* Navbar */
        .top-navbar {
            background-color: #307192;
            color: #fff;
            padding: 12px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .top-navbar .navbar-brand {
            font-weight: bold;
            color: #fff;
        }
        .top-navbar .btn:hover {
            background-color: #1f5c72;
            color: #fff;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 60px;
            left: 0;
            width: 220px;
            height: 100%;
            background-color: #f8f9fa;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            padding-top: 20px;
            transition: all 0.3s;
        }
        .sidebar.hidden { width: 60px; }
        .sidebar a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #307192;
            text-decoration: none;
            margin: 5px 10px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .sidebar a i { margin-right: 10px; }
        .sidebar a:hover {
            background-color: #74b8d3;
            color: #fff;
            transform: translateX(5px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .sidebar.hidden a span { display: none; }

        /* Main Content */
        .main-content {
            margin-left: 220px;
            padding: 80px 30px 30px 30px;
            transition: margin-left 0.3s;
        }
        .main-content.reduced { margin-left: 60px; }

        /* Cards hover */
        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>

    {{-- Top Navbar --}}
    <nav class="top-navbar">
        <span class="navbar-brand">Pet Management Dashboard</span>
        <button class="btn btn-light" id="toggleSidebar"><i class="fas fa-bars"></i></button>
    </nav>

    {{-- Sidebar --}}
    <div class="sidebar">
        @if(auth()->user()->role == 'seller')
            <a href="{{ route('dashboard.seller.annonces') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            <a href="{{ route('dashboard.seller.annonces') }}"><i class="fas fa-paw"></i><span>Mes Annonces</span></a>
            <a href="{{ route('dashboard.seller.add-annonce') }}"><i class="fas fa-plus-circle"></i><span>Ajouter une Annonce</span></a>
            <a href="{{ route('dashboard.seller.historique') }}"><i class="fas fa-history"></i><span>Historique</span></a>
            <a href="{{ route('dashboard.seller.messages') }}"><i class="fas fa-envelope"></i><span>Messages</span></a>
            <a href="{{ route('dashboard.seller.profile') }}"><i class="fas fa-user"></i><span>Profile</span></a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </a>
        @elseif(auth()->user()->role == 'buyer')
            <a href="{{ route('dashboard.buyer.historique') }}"><i class="fas fa-history"></i><span>Historique</span></a>
            <a href="{{ route('dashboard.buyer.dernieres-achats') }}"><i class="fas fa-shopping-cart"></i><span>Derniers Achats</span></a>
            <a href="{{ route('dashboard.buyer.profile') }}"><i class="fas fa-user"></i><span>Profile</span></a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </a>
        @endif
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        @yield('content')
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            mainContent.classList.toggle('reduced');
        });
    </script>  
</body>
</html>