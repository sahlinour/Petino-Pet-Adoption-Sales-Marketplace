
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
   <style>

    :root{
    --dark:#213C51;
    --blue:#6594B1;
    --pink:#DDAED3;
    --light:#EEEEEE;
    --white:#ffffff;

    --blue-soft:#d9e7f0;
    --pink-soft:#f5e5f2;

    --text-dark:#213C51;
    --text-mid:#4f6a7a;
    --text-soft:#7f97a5;

    --shadow-sm:0 6px 18px rgba(33,60,81,.10);
    --shadow-md:0 15px 35px rgba(33,60,81,.14);
    --shadow-lg:0 25px 60px rgba(33,60,81,.18);

    --radius-sm:14px;
    --radius-md:22px;
    --radius-lg:34px;

    --transition:.4s cubic-bezier(.25,.46,.45,.94);
    }

    /* ================= GLOBAL ================= */

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{

        min-height:100vh;
        overflow-x:hidden;

        font-family:'Poppins',sans-serif;

        background:
            radial-gradient(circle at top left,
            rgba(221,174,211,.25), transparent 30%),

            radial-gradient(circle at bottom right,
            rgba(101,148,177,.25), transparent 35%),

            linear-gradient(135deg,#f8fafc,#eef3f7);

        color:var(--text-dark);
    }

    /* ================= NAVBAR ================= */

    .top-navbar{

        position:fixed;

        top:18px;
        left:18px;
        right:18px;

        height:78px;

        background:rgba(255,255,255,.72);

        backdrop-filter:blur(22px);

        border:1px solid rgba(255,255,255,.35);

        border-radius:28px;

        padding:0 28px;

        display:flex;
        justify-content:space-between;
        align-items:center;

        z-index:1000;

        box-shadow:var(--shadow-md);
    }

    .top-navbar::before{

        content:"";

        position:absolute;

        inset:0;

        border-radius:28px;

        padding:1px;

        background:linear-gradient(
            135deg,
            rgba(101,148,177,.45),
            rgba(221,174,211,.45)
        );

        -webkit-mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);

        -webkit-mask-composite:xor;
                mask-composite:exclude;
    }

    .top-navbar .navbar-brand{

        position:relative;

        font-size:26px;
        font-weight:800;

        background:linear-gradient(
            135deg,
            var(--dark),
            var(--blue)
        );

        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;

        letter-spacing:.5px;
    }

    .top-navbar .btn{

        position:relative;

        width:52px;
        height:52px;

        border:none;

        border-radius:18px;

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:var(--white);

        transition:var(--transition);

        box-shadow:var(--shadow-sm);
    }

    .top-navbar .btn:hover{

        transform:translateY(-4px) rotate(6deg);

        box-shadow:var(--shadow-lg);
    }
/* ================= SIDEBAR ================= */

.sidebar{

    position:fixed;

    top:112px;
    left:18px;

    width:280px;
    height:calc(100vh - 130px);

    background:rgba(255,255,255,.72);

    backdrop-filter:blur(24px);

    border:1px solid rgba(255,255,255,.35);

    border-radius:36px;

    padding:24px 16px;

    transition:var(--transition);

    box-shadow:var(--shadow-md);

    overflow-y:auto;
    overflow-x:hidden;

    scrollbar-width:thin;
    scrollbar-color:var(--blue) transparent;

    z-index:999;
}

/* ================= SIDEBAR BACKGROUND EFFECT ================= */

.sidebar::before{

    content:"";

    position:absolute;

    top:-120px;
    right:-120px;

    width:240px;
    height:240px;

    background:radial-gradient(
        circle,
        rgba(221,174,211,.35),
        transparent 70%
    );

    pointer-events:none;
}

.sidebar::after{

    content:"";

    position:absolute;

    bottom:-100px;
    left:-100px;

    width:220px;
    height:220px;

    background:radial-gradient(
        circle,
        rgba(101,148,177,.20),
        transparent 70%
    );

    pointer-events:none;
}

/* ================= SCROLLBAR ================= */

.sidebar::-webkit-scrollbar{

    width:7px;
}

.sidebar::-webkit-scrollbar-track{

    background:transparent;
}

.sidebar::-webkit-scrollbar-thumb{

    background:linear-gradient(
        180deg,
        var(--blue),
        var(--pink)
    );

    border-radius:999px;
}

/* ================= COLLAPSE SIDEBAR ================= */

.sidebar.hidden{

    width:95px;
}

/* ================= LINKS ================= */

.sidebar a{

    position:relative;

    display:flex;
    align-items:center;
    gap:18px;

    padding:18px 20px;

    margin-bottom:14px;

    border-radius:22px;

    text-decoration:none;

    color:var(--text-mid);

    font-weight:600;

    overflow:hidden;

    transition:var(--transition);

    z-index:1;
}

/* Hover Background Animation */

.sidebar a::before{

    content:"";

    position:absolute;

    left:0;
    top:0;

    width:0;
    height:100%;

    background:linear-gradient(
        135deg,
        var(--blue),
        var(--pink)
    );

    border-radius:22px;

    transition:var(--transition);

    z-index:-1;
}

.sidebar a:hover::before{

    width:100%;
}

/* Hover Effect */

.sidebar a:hover{

    color:var(--white);

    transform:translateX(8px);

    box-shadow:0 10px 25px rgba(101,148,177,.20);
}

/* Active Link */

.sidebar a.active{

    background:linear-gradient(
        135deg,
        var(--blue),
        var(--pink)
    );

    color:white;

    box-shadow:0 10px 25px rgba(101,148,177,.22);
}

/* ================= ICON ================= */

.sidebar a i{

    min-width:22px;

    text-align:center;

    font-size:19px;

    transition:var(--transition);
}

.sidebar a:hover i{

    transform:scale(1.15);
}

/* ================= TEXT HIDE ================= */

.sidebar.hidden a{

    justify-content:center;

    padding:18px;
}

.sidebar.hidden a span{

    display:none;
}

/* ================= RESPONSIVE ================= */

@media(max-width:992px){

    .sidebar{

        width:95px;
    }

    .sidebar a{

        justify-content:center;
    }

    .sidebar a span{

        display:none;
    }
}

@media(max-width:768px){

    .sidebar{

        left:-100%;

        top:95px;

        height:calc(100vh - 110px);

        width:260px;
    }

    .sidebar.hidden{

        left:10px;
    }

    .sidebar.hidden a{

        justify-content:flex-start;
    }

    .sidebar.hidden a span{

        display:inline;
    }
}

    /* ================= MAIN CONTENT ================= */

    .main-content{

        margin-left:320px;

        padding:130px 35px 35px;

        transition:var(--transition);
    }

    .main-content.reduced{

        margin-left:125px;
    }

    /* ================= CARDS ================= */

    .card{

        position:relative;

        border:none;

        border-radius:32px;

        overflow:hidden;

        background:rgba(255,255,255,.78);

        backdrop-filter:blur(18px);

        box-shadow:var(--shadow-sm);

        transition:var(--transition);
    }

    .card::before{

        content:"";

        position:absolute;

        inset:0;

        border-radius:32px;

        padding:1px;

        background:linear-gradient(
            135deg,
            rgba(101,148,177,.35),
            rgba(221,174,211,.35)
        );

        -webkit-mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);

        -webkit-mask-composite:xor;
                mask-composite:exclude;
    }

    .card::after{

        content:"";

        position:absolute;

        top:-80px;
        right:-80px;

        width:180px;
        height:180px;

        background:radial-gradient(
            circle,
            rgba(221,174,211,.25),
            transparent 70%
        );
    }

    .card:hover{

        transform:translateY(-12px) scale(1.02);

        box-shadow:var(--shadow-lg);
    }

    .card-header{

        position:relative;

        border:none;

        background:transparent;

        padding:28px 28px 12px;

        font-size:18px;
        font-weight:700;

        color:var(--dark);
    }

    .card-body{

        position:relative;

        padding:20px 28px 30px;
    }

    /* ================= TABLE ================= */

    .table{

        overflow:hidden;

        border-radius:28px;

        background:rgba(255,255,255,.82);

        backdrop-filter:blur(16px);

        box-shadow:var(--shadow-sm);
    }

    .table thead{

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:var(--white);
    }

    .table th,
    .table td{

        padding:18px;

        vertical-align:middle;

        border:none;
    }

    /* ================= BUTTONS ================= */

    .btn-primary{

        border:none;

        border-radius:18px;

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        padding:13px 26px;

        font-weight:600;

        transition:var(--transition);

        box-shadow:var(--shadow-sm);
    }

    .btn-primary:hover{

        transform:translateY(-4px);

        box-shadow:var(--shadow-lg);
    }

    /* ================= FORM ================= */

    .form-control{

        border:none;

        border-radius:18px;

        padding:15px 18px;

        background:rgba(217,231,240,.55);

        color:var(--text-dark);

        transition:var(--transition);
    }

    .form-control:focus{

        background:var(--white);

        box-shadow:
            0 0 0 5px rgba(101,148,177,.16);

        border:none;
    }

    /* ================= SCROLLBAR ================= */

    ::-webkit-scrollbar{

        width:8px;
    }

    ::-webkit-scrollbar-thumb{

        background:linear-gradient(
            180deg,
            var(--blue),
            var(--pink)
        );

        border-radius:999px;
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:992px){

        .sidebar{

            width:95px;
        }

        .sidebar a{

            justify-content:center;
        }

        .sidebar a span{

            display:none;
        }

        .main-content{

            margin-left:130px;
        }
    }

    @media(max-width:768px){

        .top-navbar{

            top:10px;
            left:10px;
            right:10px;

            padding:0 18px;
        }

        .top-navbar .navbar-brand{

            font-size:18px;
        }

        .sidebar{

            left:-100%;
        }

        .sidebar.hidden{

            left:10px;

            width:260px;
        }

        .sidebar.hidden a{

            justify-content:flex-start;
        }

        .sidebar.hidden a span{

            display:inline;
        }

        .main-content{

            margin-left:0;

            padding:115px 15px 20px;
        }

        .main-content.reduced{

            margin-left:0;
        }
    }

    </style>
</head>
<body>

    
    <nav class="top-navbar">
        <span class="navbar-brand">Pet Management Dashboard</span>
        <button class="btn btn-light" id="toggleSidebar"><i class="fas fa-bars"></i></button>
    </nav>

    
    <div class="sidebar">
        <?php if(auth()->user()->role == 'seller'): ?>
            <a href="<?php echo e(route('seller.dashboard')); ?>"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            <a href="<?php echo e(route('seller.listings')); ?>"><i class="fas fa-paw"></i><span>Mes Annonces</span></a>
            <a href="<?php echo e(route('seller.listings.create')); ?>"><i class="fas fa-plus-circle"></i><span>Ajouter une Annonce</span></a>
            <a href="<?php echo e(route('seller.historique')); ?>"><i class="fas fa-history"></i><span>Historique</span></a>
            <a href="<?php echo e(route('seller.messages')); ?>"><i class="fas fa-envelope"></i><span>Messages</span></a>
            <a href="<?php echo e(route('profile')); ?>"><i class="fas fa-user"></i><span>Profile</span></a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </a>
        <?php elseif(auth()->user()->role == 'buyer'): ?>
            <a href="<?php echo e(route('buyer.dashboard')); ?>"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            <a href="<?php echo e(route('buyer.favorites')); ?>"><i class="fas fa-heart"></i><span>Favorites</span></a>
            <a href="<?php echo e(route('buyer.dernieres-achats')); ?>"><i class="fas fa-shopping-cart"></i><span>Derniers Achats</span></a>
            <a href="<?php echo e(route('profile.update')); ?>"><i class="fas fa-user"></i><span>Profile</span></a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </a>
        <?php endif; ?>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
    </div>

    
    <div class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    
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
</html><?php /**PATH C:\Users\pro\composer\petSellingSystem\resources\views/layouts/layoutDashboard.blade.php ENDPATH**/ ?>