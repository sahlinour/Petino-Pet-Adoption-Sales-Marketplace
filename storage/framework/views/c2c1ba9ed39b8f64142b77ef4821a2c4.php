

<?php $__env->startSection('content'); ?>

<style>

    .buyer-dashboard{
        animation:fadeIn .6s ease;
    }

    @keyframes fadeIn{
        from{
            opacity:0;
            transform:translateY(15px);
        }
        to{
            opacity:1;
            transform:translateY(0);
        }
    }

    /* ================= HEADER ================= */

    .dashboard-header{

        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;

        margin-bottom:35px;
    }

    .dashboard-title{

        font-size:34px;
        font-weight:800;

        color:var(--dark);

        margin-bottom:8px;
    }

    .dashboard-subtitle{

        color:var(--text-soft);

        font-size:15px;
    }

    .welcome-box{

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        padding:14px 22px;

        border-radius:20px;

        color:white;

        font-weight:600;

        box-shadow:var(--shadow-sm);
    }

    /* ================= STATS ================= */

    .stats-card{

        position:relative;

        overflow:hidden;

        border-radius:28px;

        padding:28px;

        height:100%;

        background:rgba(255,255,255,.8);

        backdrop-filter:blur(18px);

        box-shadow:var(--shadow-sm);

        transition:var(--transition);
    }

    .stats-card:hover{

        transform:translateY(-10px);

        box-shadow:var(--shadow-lg);
    }

    .stats-card::before{

        content:"";

        position:absolute;

        top:-50px;
        right:-50px;

        width:140px;
        height:140px;

        border-radius:50%;

        background:rgba(221,174,211,.20);
    }

    .stats-icon{

        width:65px;
        height:65px;

        display:flex;
        align-items:center;
        justify-content:center;

        border-radius:20px;

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:white;

        font-size:24px;

        margin-bottom:20px;
    }

    .stats-title{

        color:var(--text-soft);

        font-size:15px;

        margin-bottom:10px;
    }

    .stats-number{

        font-size:32px;
        font-weight:800;

        color:var(--dark);
    }

    /* ================= SECTIONS ================= */

    .dashboard-section{

        margin-top:35px;
    }

    .section-card{

        background:rgba(255,255,255,.82);

        backdrop-filter:blur(16px);

        border-radius:30px;

        padding:28px;

        box-shadow:var(--shadow-sm);

        height:100%;
    }

    .section-title{

        font-size:22px;
        font-weight:700;

        color:var(--dark);

        margin-bottom:25px;
    }

    /* ================= PURCHASE ITEMS ================= */

    .purchase-item{

        display:flex;
        justify-content:space-between;
        align-items:center;

        padding:18px 20px;

        border-radius:18px;

        background:var(--blue-soft);

        margin-bottom:15px;

        transition:var(--transition);
    }

    .purchase-item:hover{

        transform:translateX(6px);

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:white;
    }

    .purchase-item h6{

        margin:0;

        font-weight:700;
    }

    .purchase-item small{

        color:inherit;
    }

    .purchase-price{

        font-weight:700;

        font-size:18px;
    }

    /* ================= QUICK ACTIONS ================= */

    .quick-actions{

        display:grid;

        grid-template-columns:repeat(auto-fit,minmax(180px,1fr));

        gap:18px;
    }

    .action-btn{

        display:flex;
        align-items:center;
        gap:14px;

        text-decoration:none;

        padding:18px 20px;

        border-radius:22px;

        background:rgba(255,255,255,.9);

        color:var(--dark);

        font-weight:600;

        transition:var(--transition);

        box-shadow:var(--shadow-sm);
    }

    .action-btn:hover{

        transform:translateY(-6px);

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:white;
    }

    .action-btn i{

        font-size:22px;
    }

    /* ================= EMPTY BOX ================= */

    .empty-box{

        text-align:center;

        padding:35px 20px;
    }

    .empty-box i{

        font-size:50px;

        color:var(--pink);

        margin-bottom:15px;
    }

    .empty-box p{

        color:var(--text-soft);
    }

</style>

<div class="buyer-dashboard">

    <!-- ================= HEADER ================= -->

    <div class="dashboard-header">

        <div>
            <h1 class="dashboard-title">
                Buyer Dashboard
            </h1>

            <p class="dashboard-subtitle">
                Welcome back 👋 Manage your purchases and activities easily.
            </p>
        </div>

        <div class="welcome-box">
            <i class="fas fa-user-circle me-2"></i>
            <?php echo e(auth()->user()->name); ?>

        </div>

    </div>

    <!-- ================= STATS ================= -->

    <div class="row g-4">

        <div class="col-lg-4 col-md-6">

            <div class="stats-card">

                <div class="stats-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>

                <p class="stats-title">
                    Total Purchases
                </p>

                <h2 class="stats-number">
                    12
                </h2>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="stats-card">

                <div class="stats-icon">
                    <i class="fas fa-heart"></i>
                </div>

                <p class="stats-title">
                    Favorite Pets
                </p>

                <h2 class="stats-number">
                    5
                </h2>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="stats-card">

                <div class="stats-icon">
                    <i class="fas fa-wallet"></i>
                </div>

                <p class="stats-title">
                    Total Spent
                </p>

                <h2 class="stats-number">
                    $2,450
                </h2>

            </div>

        </div>

    </div>

    <!-- ================= CONTENT ================= -->

    <div class="row dashboard-section g-4">

        <!-- Recent Purchases -->

        <div class="col-lg-7">

            <div class="section-card">

                <h3 class="section-title">
                    Recent Purchases
                </h3>

                <div class="purchase-item">

                    <div>
                        <h6>Golden Retriever</h6>
                        <small>Purchased on 10 May 2026</small>
                    </div>

                    <div class="purchase-price">
                        $450
                    </div>

                </div>

                <div class="purchase-item">

                    <div>
                        <h6>Persian Cat</h6>
                        <small>Purchased on 02 May 2026</small>
                    </div>

                    <div class="purchase-price">
                        $320
                    </div>

                </div>

                <div class="purchase-item">

                    <div>
                        <h6>Parrot Macaw</h6>
                        <small>Purchased on 27 April 2026</small>
                    </div>

                    <div class="purchase-price">
                        $280
                    </div>

                </div>

            </div>

        </div>

        <!-- Quick Actions -->

        <div class="col-lg-5">

            <div class="section-card">

                <h3 class="section-title">
                    Quick Actions
                </h3>

                <div class="quick-actions">

                    <a href="<?php echo e(route('buyer.dernieres-achats')); ?>" class="action-btn">
                        <i class="fas fa-shopping-bag"></i>
                        Purchases
                    </a>

                    <a href="<?php echo e(route('buyer.historique')); ?>" class="action-btn">
                        <i class="fas fa-history"></i>
                        History
                    </a>

                    <a href="<?php echo e(route('profile.update')); ?>" class="action-btn">
                        <i class="fas fa-user"></i>
                        Profile
                    </a>

                    <a href="#" class="action-btn">
                        <i class="fas fa-heart"></i>
                        Favorites
                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- ================= EMPTY SECTION ================= -->

    <div class="dashboard-section">

        <div class="section-card empty-box">

            <i class="fas fa-paw"></i>

            <h4>
                Explore New Pets
            </h4>

            <p>
                Discover amazing pets and find your perfect companion.
            </p>

            <button class="btn btn-primary mt-3">
                Browse Pets
            </button>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layoutDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pro\composer\petSellingSystem\resources\views/dashboard/buyer/dashboardBuyer.blade.php ENDPATH**/ ?>