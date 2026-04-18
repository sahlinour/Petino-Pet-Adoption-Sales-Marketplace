<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Navbar */
        .top-navbar {
            background-color: #307192;
            color: #fff;
            padding: 10px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .top-navbar .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

          .top-navbar .btn:hover {
        background-color: #1f5c72;
        color: #fff;
    }
        .sidebar {
            position: fixed;
            top: 60px;
            left: 0;
            width: 220px;
            height: 100%;
            background-color: #f8f9fa;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            padding: 20px 0;
            transition: all 0.3s;
        }

        .sidebar.hidden {
            width: 60px;
        }

     
    .sidebar .nav-link {
        color: #307192;
        padding: 12px 20px;
        display: flex;
        align-items: center;
        border-radius: 5px;
        margin: 5px 10px;
        transition: all 0.3s ease;
    }

    .sidebar .nav-link:hover {
        background-color: #74b8d3;  
        color: #fff;                 
        transform: translateX(5px);  
        box-shadow: 0 4px 10px rgba(0,0,0,0.15); 
    }

    .sidebar .nav-link i {
        margin-right: 10px;
    }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar.hidden .nav-link span {
            display: none;
        }
          
        .main-content {
            margin-left: 220px;
            padding: 80px 30px 30px 30px;
            transition: margin-left 0.3s;
        }

        .main-content.reduced {
            margin-left: 60px;
        }

        /* Cards hover effect */
        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="top-navbar d-flex justify-content-between align-items-center">
        <span class="navbar-brand">Pet Management Dashboard</span>
        <button class="btn btn-light" id="toggleSidebar"><i class="fas fa-bars"></i></button>
    </nav>

   <!-- Sidebar -->
<div class="sidebar">
    @if(auth()->user()->role == 'seller')
        <a href="{{ route('seller.dashboard') }}">Dashboard</a>
        <a href="{{ route('seller.annonces') }}">Mes Annonces</a>
        <a href="{{ route('seller.addAnnonce') }}">Ajouter une Annonce</a>
        <a href="{{ route('seller.historique') }}">Historique</a>
        <a href="{{ route('messages') }}">Messages</a>
        <a href="{{ route('profile') }}">Profile</a>
    @elseif(auth()->user()->role == 'buyer')
        <a href="{{ route('buyer.historique') }}">Historique</a>
        <a href="{{ route('latest.purchases') }}">Derniers Achats</a>
        <a href="{{ route('profile') }}">Profile</a>
    @endif
</div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="container-fluid">
            <h2 class="mb-4">Welcome, {{ Auth::user()->name ?? 'Admin' }}</h2>

            <!-- Stat Cards -->
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary h-100 text-center">
                        <div class="card-header">Total Pets</div>
                        <div class="card-body">
                            <h3>{{ $totalPets ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success h-100 text-center">
                        <div class="card-header">Active Sellers</div>
                        <div class="card-body">
                            <h3>{{ $activeSellers ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning h-100 text-center">
                        <div class="card-header">Pending Orders</div>
                        <div class="card-body">
                            <h3>{{ $pendingOrders ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger h-100 text-center">
                        <div class="card-header">Revenue</div>
                        <div class="card-body">
                            <h3>${{ $totalRevenue ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="row mt-5">
                <div class="col-md-6">
                    <h5 class="text-center">Pets Status</h5>
                    <canvas id="petsChart"></canvas>
                </div>
                <div class="col-md-6">
                    <h5 class="text-center">Orders Status</h5>
                    <canvas id="ordersChart"></canvas>
                </div>
            </div>

        
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Toggle Sidebar
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            mainContent.classList.toggle('reduced');
        });

        // Pets Chart
        const petsCtx = document.getElementById('petsChart').getContext('2d');
        const petsChart = new Chart(petsCtx, {
            type: 'bar',
            data: {
                labels: ['Available','Sold','Reserved'],
                datasets: [{
                    label: 'Pets',
                    data: [{{ $availablePets ?? 0 }}, {{ $soldPets ?? 0 }}, {{ $reservedPets ?? 0 }}],
                    backgroundColor: ['rgba(75,192,192,0.6)','rgba(255,99,132,0.6)','rgba(255,206,86,0.6)'],
                    borderColor: ['rgba(75,192,192,1)','rgba(255,99,132,1)','rgba(255,206,86,1)'],
                    borderWidth:1
                }]
            },
            options:{ scales:{ y:{ beginAtZero:true } } }
        });

        // Orders Chart
        const ordersCtx = document.getElementById('ordersChart').getContext('2d');
        const ordersChart = new Chart(ordersCtx, {
            type: 'pie',
            data: {
                labels: ['Pending','Completed','Cancelled'],
                datasets: [{
                    data: [{{ $pendingOrders ?? 0 }}, {{ $completedOrders ?? 0 }}, {{ $cancelledOrders ?? 0 }}],
                    backgroundColor: ['rgba(255,206,86,0.6)','rgba(54,162,235,0.6)','rgba(255,99,132,0.6)'],
                    borderColor: ['rgba(255,206,86,1)','rgba(54,162,235,1)','rgba(255,99,132,1)'],
                    borderWidth:1
                }]
            },
            options:{ responsive:true }
        });
    </script>
</body>
</html>