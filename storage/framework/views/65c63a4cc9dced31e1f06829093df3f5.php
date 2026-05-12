

<?php $__env->startSection('content'); ?>

<style>

    /* ================= PAGE ================= */

    .seller-dashboard{

        animation:fadeDashboard .5s ease;
    }

    @keyframes fadeDashboard{

        from{
            opacity:0;
            transform:translateY(20px);
        }

        to{
            opacity:1;
            transform:translateY(0);
        }
    }

    /* ================= HERO ================= */

    .dashboard-hero{

        position:relative;

        overflow:hidden;

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--dark)
        );

        border-radius:40px;

        padding:45px;

        color:white;

        margin-bottom:35px;

        box-shadow:var(--shadow-lg);
    }

    .dashboard-hero::before{

        content:"";

        position:absolute;

        top:-120px;
        right:-120px;

        width:300px;
        height:300px;

        border-radius:50%;

        background:rgba(255,255,255,.08);
    }

    .dashboard-hero::after{

        content:"";

        position:absolute;

        bottom:-100px;
        left:-100px;

        width:260px;
        height:260px;

        border-radius:50%;

        background:rgba(255,255,255,.05);
    }

    .hero-content{

        position:relative;

        z-index:2;
    }

    .hero-title{

        font-size:42px;

        font-weight:800;

        margin-bottom:14px;
    }

    .hero-text{

        max-width:650px;

        line-height:1.8;

        color:rgba(255,255,255,.88);

        margin-bottom:30px;
    }

    .hero-actions{

        display:flex;
        gap:16px;
        flex-wrap:wrap;
    }

    .hero-btn{

        padding:15px 24px;

        border-radius:20px;

        text-decoration:none;

        font-weight:700;

        transition:var(--transition);

        display:flex;
        align-items:center;
        gap:10px;
    }

    .hero-btn-primary{

        background:white;

        color:var(--dark);
    }

    .hero-btn-secondary{

        border:1px solid rgba(255,255,255,.25);

        background:rgba(255,255,255,.10);

        color:white;

        backdrop-filter:blur(10px);
    }

    .hero-btn:hover{

        transform:translateY(-4px);

        color:inherit;
    }

    /* ================= STATS ================= */

    .stats-grid{

        display:grid;

        grid-template-columns:repeat(4,1fr);

        gap:24px;

        margin-bottom:35px;
    }

    .stat-card{

        background:rgba(255,255,255,.82);

        backdrop-filter:blur(16px);

        border-radius:32px;

        padding:28px;

        box-shadow:var(--shadow-sm);

        transition:var(--transition);

        position:relative;

        overflow:hidden;
    }

    .stat-card:hover{

        transform:translateY(-8px);

        box-shadow:var(--shadow-lg);
    }

    .stat-card::before{

        content:"";

        position:absolute;

        top:-50px;
        right:-50px;

        width:140px;
        height:140px;

        border-radius:50%;

        background:rgba(221,174,211,.18);
    }

    .stat-icon{

        width:70px;
        height:70px;

        border-radius:22px;

        display:flex;
        align-items:center;
        justify-content:center;

        font-size:28px;

        color:white;

        margin-bottom:22px;
    }

    .icon-blue{
        background:linear-gradient(135deg,#6594B1,#4f6a7a);
    }

    .icon-pink{
        background:linear-gradient(135deg,#DDAED3,#c98ab9);
    }

    .icon-dark{
        background:linear-gradient(135deg,#213C51,#355b74);
    }

    .icon-light{
        background:linear-gradient(135deg,#7ea6c0,#b0cadb);
    }

    .stat-title{

        color:var(--text-soft);

        font-weight:600;

        margin-bottom:8px;
    }

    .stat-number{

        font-size:34px;

        font-weight:800;

        color:var(--dark);
    }

    /* ================= CONTENT GRID ================= */

    .content-grid{

        display:grid;

        grid-template-columns:1.4fr .8fr;

        gap:24px;
    }

    /* ================= CARD ================= */

    .dashboard-card{

        background:rgba(255,255,255,.82);

        backdrop-filter:blur(16px);

        border-radius:32px;

        padding:30px;

        box-shadow:var(--shadow-sm);
    }

    .card-title{

        font-size:24px;

        font-weight:800;

        color:var(--dark);

        margin-bottom:24px;
    }

    /* ================= TABLE ================= */

    .dashboard-table{

        width:100%;

        border-collapse:collapse;
    }

    .dashboard-table th{

        padding:16px;

        background:#f4f7fb;

        color:var(--text-mid);

        font-weight:700;

        border:none;
    }

    .dashboard-table td{

        padding:18px 16px;

        border-bottom:1px solid #edf1f5;

        color:var(--text-mid);
    }

    .dashboard-table tr:hover{

        background:#fafcff;
    }

    /* ================= STATUS ================= */

    .status{

        padding:8px 14px;

        border-radius:999px;

        font-size:13px;

        font-weight:700;
    }

    .status-active{

        background:#d8f5e5;

        color:#1b8d52;
    }

    .status-pending{

        background:#fff1d6;

        color:#d09100;
    }

    .status-sold{

        background:#ffdfe4;

        color:#d63b5c;
    }

    /* ================= ACTIVITY ================= */

    .activity-item{

        display:flex;
        align-items:flex-start;
        gap:16px;

        margin-bottom:24px;
    }

    .activity-icon{

        width:52px;
        height:52px;

        border-radius:18px;

        display:flex;
        align-items:center;
        justify-content:center;

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:white;

        font-size:18px;
    }

    .activity-title{

        font-weight:700;

        color:var(--dark);

        margin-bottom:5px;
    }

    .activity-text{

        color:var(--text-soft);

        font-size:14px;
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:1200px){

        .stats-grid{

            grid-template-columns:repeat(2,1fr);
        }

        .content-grid{

            grid-template-columns:1fr;
        }
    }

    @media(max-width:768px){

        .stats-grid{

            grid-template-columns:1fr;
        }

        .hero-title{

            font-size:30px;
        }

        .dashboard-hero{

            padding:30px;
        }

        .dashboard-card{

            padding:24px;
        }
    }

</style>

<div class="seller-dashboard">

    <!-- ================= HERO ================= -->

    <div class="dashboard-hero">

        <div class="hero-content">

            <h1 class="hero-title">
                Bienvenue Seller 👋
            </h1>

            <p class="hero-text">
                Gérez vos annonces, consultez vos statistiques
                et suivez les activités de votre boutique
                depuis votre tableau de bord.
            </p>

            <div class="hero-actions">

                <a href="<?php echo e(route('seller.listings.create')); ?>"
                   class="hero-btn hero-btn-primary">

                    <i class="fas fa-plus-circle"></i>

                    Ajouter une annonce

                </a>

                <a href="<?php echo e(route('seller.listings')); ?>"
                   class="hero-btn hero-btn-secondary">

                    <i class="fas fa-paw"></i>

                    Voir mes annonces

                </a>

            </div>

        </div>

    </div>

    <!-- ================= STATS ================= -->

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon icon-blue">
                <i class="fas fa-paw"></i>
            </div>

            <div class="stat-title">
                Total annonces
            </div>

            <div class="stat-number">
                24
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon icon-pink">
                <i class="fas fa-shopping-cart"></i>
            </div>

            <div class="stat-title">
                Ventes réalisées
            </div>

            <div class="stat-number">
                12
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon icon-dark">
                <i class="fas fa-clock"></i>
            </div>

            <div class="stat-title">
                En attente
            </div>

            <div class="stat-number">
                5
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon icon-light">
                <i class="fas fa-money-bill-wave"></i>
            </div>

            <div class="stat-title">
                Revenus
            </div>

            <div class="stat-number">
                12K
            </div>

        </div>

    </div>

    <!-- ================= CONTENT ================= -->

    <div class="content-grid">

        <!-- TABLE -->

        <div class="dashboard-card">

            <h2 class="card-title">
                Dernières annonces
            </h2>

            <table class="dashboard-table">

                <thead>

                    <tr>
                        <th>Animal</th>
                        <th>Prix</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>Golden Retriever</td>

                        <td>4500 MAD</td>

                        <td>
                            <span class="status status-active">
                                Active
                            </span>
                        </td>

                    </tr>

                    <tr>

                        <td>British Cat</td>

                        <td>3200 MAD</td>

                        <td>
                            <span class="status status-pending">
                                Pending
                            </span>
                        </td>

                    </tr>

                    <tr>

                        <td>Parrot</td>

                        <td>1800 MAD</td>

                        <td>
                            <span class="status status-sold">
                                Sold
                            </span>
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        <!-- ACTIVITY -->

        <div class="dashboard-card">

            <h2 class="card-title">
                Activités récentes
            </h2>

            <div class="activity-item">

                <div class="activity-icon">
                    <i class="fas fa-plus"></i>
                </div>

                <div>

                    <div class="activity-title">
                        Nouvelle annonce ajoutée
                    </div>

                    <div class="activity-text">
                        Vous avez publié une annonce aujourd'hui.
                    </div>

                </div>

            </div>

            <div class="activity-item">

                <div class="activity-icon">
                    <i class="fas fa-check"></i>
                </div>

                <div>

                    <div class="activity-title">
                        Vente confirmée
                    </div>

                    <div class="activity-text">
                        Une commande a été validée avec succès.
                    </div>

                </div>

            </div>

            <div class="activity-item">

                <div class="activity-icon">
                    <i class="fas fa-envelope"></i>
                </div>

                <div>

                    <div class="activity-title">
                        Nouveau message
                    </div>

                    <div class="activity-text">
                        Vous avez reçu un message d’un buyer.
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layoutDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pro\composer\petSellingSystem\resources\views/dashboard/seller/dashboardSeller.blade.php ENDPATH**/ ?>