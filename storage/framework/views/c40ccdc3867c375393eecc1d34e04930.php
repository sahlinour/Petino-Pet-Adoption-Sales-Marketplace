

<?php $__env->startSection('content'); ?>

<?php
    use Illuminate\Support\Str;
?>

<style>

    /* ================= PAGE ================= */

    .annonces-page{

        animation:fadeIn .5s ease;
    }

    @keyframes fadeIn{

        from{
            opacity:0;
            transform:translateY(20px);
        }

        to{
            opacity:1;
            transform:translateY(0);
        }
    }

    /* ================= HEADER ================= */

    .annonces-header{

        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;

        margin-bottom:35px;
    }

    .annonces-title{

        font-size:38px;
        font-weight:800;

        color:var(--dark);

        margin-bottom:8px;
    }

    .annonces-subtitle{

        color:var(--text-soft);

        font-size:15px;
    }

    .add-btn{

        display:flex;
        align-items:center;
        gap:10px;

        padding:15px 24px;

        border-radius:20px;

        text-decoration:none;

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:white;

        font-weight:700;

        transition:var(--transition);

        box-shadow:var(--shadow-sm);
    }

    .add-btn:hover{

        transform:translateY(-4px);

        box-shadow:var(--shadow-lg);

        color:white;
    }

    /* ================= STATS ================= */

    .stats-grid{

        display:grid;

        grid-template-columns:repeat(3,1fr);

        gap:24px;

        margin-bottom:35px;
    }

    .stat-card{

        background:rgba(255,255,255,.82);

        backdrop-filter:blur(16px);

        border-radius:30px;

        padding:28px;

        box-shadow:var(--shadow-sm);

        transition:var(--transition);
    }

    .stat-card:hover{

        transform:translateY(-6px);

        box-shadow:var(--shadow-lg);
    }

    .stat-icon{

        width:68px;
        height:68px;

        border-radius:20px;

        display:flex;
        align-items:center;
        justify-content:center;

        color:white;

        font-size:28px;

        margin-bottom:20px;
    }

    .icon-blue{
        background:linear-gradient(135deg,#6594B1,#4f6a7a);
    }

    .icon-pink{
        background:linear-gradient(135deg,#DDAED3,#c989bb);
    }

    .icon-dark{
        background:linear-gradient(135deg,#213C51,#355b74);
    }

    .stat-title{

        color:var(--text-soft);

        font-weight:600;

        margin-bottom:6px;
    }

    .stat-number{

        font-size:34px;

        font-weight:800;

        color:var(--dark);
    }

    /* ================= GRID ================= */

    .annonces-grid{

        display:grid;

        grid-template-columns:repeat(3,1fr);

        gap:24px;
    }

    /* ================= CARD ================= */

    .annonce-card{

        background:rgba(255,255,255,.82);

        backdrop-filter:blur(16px);

        border-radius:32px;

        overflow:hidden;

        box-shadow:var(--shadow-sm);

        transition:var(--transition);

        position:relative;
    }

    .annonce-card:hover{

        transform:translateY(-8px);

        box-shadow:var(--shadow-lg);
    }

    /* ================= IMAGE ================= */

    .annonce-image{

        height:220px;

        background:linear-gradient(
            135deg,
            var(--blue-soft),
            var(--pink-soft)
        );

        display:flex;
        align-items:center;
        justify-content:center;

        font-size:70px;

        color:var(--blue);
    }

    /* ================= CONTENT ================= */

    .annonce-content{

        padding:24px;
    }

    .annonce-name{

        font-size:24px;

        font-weight:800;

        color:var(--dark);

        margin-bottom:10px;
    }

    .annonce-price{

        font-size:26px;

        font-weight:800;

        color:var(--blue);

        margin-bottom:14px;
    }

    .annonce-description{

        color:var(--text-soft);

        line-height:1.7;

        margin-bottom:22px;

        font-size:14px;
    }

    /* ================= STATUS ================= */

    .status{

        position:absolute;

        top:18px;
        right:18px;

        padding:8px 14px;

        border-radius:999px;

        font-size:13px;

        font-weight:700;
    }

    .status-active{

        background:#d8f5e5;

        color:#1d8a53;
    }

    .status-pending{

        background:#fff1d6;

        color:#d09100;
    }

    .status-sold{

        background:#ffdce2;

        color:#d53c5d;
    }

    /* ================= ACTIONS ================= */

    .card-actions{

        display:flex;
        gap:12px;
    }

    .action-btn{

        flex:1;

        text-align:center;

        padding:13px;

        border-radius:16px;

        text-decoration:none;

        font-weight:700;

        transition:var(--transition);
    }

    .edit-btn{

        background:#f4f7fb;

        color:var(--dark);
    }

    .delete-btn{

        background:linear-gradient(
            135deg,
            #ff6b81,
            #ff4d6d
        );

        color:white;
    }

    .action-btn:hover{

        transform:translateY(-3px);
    }

    /* ================= EMPTY ================= */

    .empty-box{

        grid-column:1/-1;

        background:rgba(255,255,255,.82);

        backdrop-filter:blur(16px);

        border-radius:32px;

        padding:60px 30px;

        text-align:center;

        box-shadow:var(--shadow-sm);
    }

    .empty-box i{

        font-size:70px;

        color:var(--blue);

        margin-bottom:20px;
    }

    .empty-box h3{

        font-weight:800;

        color:var(--dark);

        margin-bottom:10px;
    }

    .empty-box p{

        color:var(--text-soft);
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:1200px){

        .annonces-grid{

            grid-template-columns:repeat(2,1fr);
        }
    }

    @media(max-width:992px){

        .stats-grid{

            grid-template-columns:1fr;
        }
    }

    @media(max-width:768px){

        .annonces-grid{

            grid-template-columns:1fr;
        }

        .annonces-title{

            font-size:30px;
        }
    }

</style>

<div class="annonces-page">

    <!-- ================= HEADER ================= -->

    <div class="annonces-header">

        <div>

            <h1 class="annonces-title">
                Mes Annonces
            </h1>

            <p class="annonces-subtitle">
                Gérez vos annonces et consultez leur statut.
            </p>

        </div>

        <a href="<?php echo e(route('seller.listings.create')); ?>"
           class="add-btn">

            <i class="fas fa-plus-circle"></i>

            Ajouter une annonce

        </a>

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
                <?php echo e($listings->count()); ?>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon icon-pink">
                <i class="fas fa-check-circle"></i>
            </div>

            <div class="stat-title">
                Actives
            </div>

            <div class="stat-number">
                <?php echo e($listings->where('status','active')->count()); ?>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon icon-dark">
                <i class="fas fa-shopping-cart"></i>
            </div>

            <div class="stat-title">
                Vendues
            </div>

            <div class="stat-number">
                <?php echo e($listings->where('status','sold')->count()); ?>

            </div>

        </div>

    </div>

    <!-- ================= ANNONCES ================= -->

    <div class="annonces-grid">

        <?php $__empty_1 = true; $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="annonce-card">

                <!-- STATUS -->

                <?php if($listing->status == 'active'): ?>

                    <span class="status status-active">
                        Active
                    </span>

                <?php elseif($listing->status == 'pending'): ?>

                    <span class="status status-pending">
                        Pending
                    </span>

                <?php elseif($listing->status == 'sold'): ?>

                    <span class="status status-sold">
                        Sold
                    </span>

                <?php else: ?>

                    <span class="status status-sold">
                        Expired
                    </span>

                <?php endif; ?>

                <!-- IMAGE -->

                <div class="annonce-image">

                    <i class="fas fa-paw"></i>

                </div>

                <!-- CONTENT -->

                <div class="annonce-content">

                    <h3 class="annonce-name">

                        <?php echo e($listing->title); ?>


                    </h3>

                    <div class="annonce-price">

                        <?php echo e(number_format($listing->price,2)); ?> MAD

                    </div>

                    <p class="annonce-description">

                        <?php echo e(Str::limit($listing->description, 100)); ?>


                    </p>

                    <!-- ACTIONS -->

                    <div class="card-actions">

                        <a href=""
                           class="action-btn edit-btn">

                            Modifier

                        </a>

                        <form action=""
                              method="POST"
                              style="flex:1;">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit"
                                    class="action-btn delete-btn border-0 w-100">

                                Supprimer

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <!-- EMPTY -->

            <div class="empty-box">

                <i class="fas fa-folder-open"></i>

                <h3>
                    Aucune annonce trouvée
                </h3>

                <p>
                    Vous n'avez pas encore ajouté d'annonce.
                </p>

            </div>

        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layoutDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pro\composer\petSellingSystem\resources\views/dashboard/seller/annonces.blade.php ENDPATH**/ ?>