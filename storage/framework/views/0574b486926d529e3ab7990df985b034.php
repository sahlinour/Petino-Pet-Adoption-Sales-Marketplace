

<?php $__env->startSection('content'); ?>

<style>

    /* ================= PAGE ================= */

    .purchase-page{
        animation:fadeIn .5s ease;
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

    .page-header{

        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;

        margin-bottom:35px;
    }

    .page-title{

        font-size:34px;
        font-weight:800;

        color:var(--dark);

        margin-bottom:8px;
    }

    .page-subtitle{

        color:var(--text-soft);

        font-size:15px;
    }

    .purchase-count{

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:white;

        padding:14px 22px;

        border-radius:18px;

        font-weight:700;

        box-shadow:var(--shadow-sm);
    }

    /* ================= TABLE CARD ================= */

    .table-card{

        background:rgba(255,255,255,.82);

        backdrop-filter:blur(16px);

        border-radius:32px;

        padding:25px;

        box-shadow:var(--shadow-sm);

        overflow:hidden;
    }

    /* ================= TABLE ================= */

    .custom-table{

        margin:0;

        overflow:hidden;

        border-radius:24px;
    }

    .custom-table thead{

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:white;
    }

    .custom-table th{

        padding:18px;

        border:none;

        font-size:15px;
        font-weight:700;

        white-space:nowrap;
    }

    .custom-table td{

        padding:18px;

        vertical-align:middle;

        border-color:rgba(101,148,177,.12);

        color:var(--text-mid);

        font-weight:500;
    }

    .custom-table tbody tr{

        transition:var(--transition);
    }

    .custom-table tbody tr:hover{

        background:rgba(217,231,240,.28);

        transform:scale(1.01);
    }

    /* ================= PET INFO ================= */

    .pet-info{

        display:flex;
        align-items:center;
        gap:12px;
    }

    .pet-icon{

        width:45px;
        height:45px;

        border-radius:14px;

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

    .pet-name{

        font-weight:700;

        color:var(--dark);
    }

    /* ================= PRICE ================= */

    .price{

        font-weight:800;

        color:var(--dark);

        font-size:16px;
    }

    /* ================= BADGES ================= */

    .status-badge{

        padding:10px 14px;

        border-radius:999px;

        font-size:13px;

        font-weight:700;

        display:inline-flex;
        align-items:center;
        gap:8px;
    }

    .status-pending{

        background:rgba(255,193,7,.15);

        color:#d39e00;
    }

    .status-completed{

        background:rgba(25,135,84,.15);

        color:#198754;
    }

    .status-cancelled{

        background:rgba(220,53,69,.15);

        color:#dc3545;
    }

    /* ================= EMPTY STATE ================= */

    .empty-state{

        background:rgba(255,255,255,.82);

        backdrop-filter:blur(16px);

        border-radius:32px;

        padding:60px 30px;

        text-align:center;

        box-shadow:var(--shadow-sm);
    }

    .empty-state i{

        font-size:70px;

        margin-bottom:20px;

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
    }

    .empty-state h3{

        font-size:28px;
        font-weight:800;

        color:var(--dark);

        margin-bottom:12px;
    }

    .empty-state p{

        color:var(--text-soft);

        margin-bottom:25px;
    }

    .browse-btn{

        display:inline-flex;
        align-items:center;
        gap:10px;

        text-decoration:none;

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:white;

        padding:14px 24px;

        border-radius:18px;

        font-weight:700;

        transition:var(--transition);

        box-shadow:var(--shadow-sm);
    }

    .browse-btn:hover{

        transform:translateY(-4px);

        box-shadow:var(--shadow-md);

        color:white;
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:768px){

        .page-title{
            font-size:26px;
        }

        .table-card{
            padding:15px;
        }

        .custom-table th,
        .custom-table td{
            padding:14px;
        }
    }

</style>

<div class="purchase-page">

    <!-- ================= HEADER ================= -->

    <div class="page-header">

        <div>

            <h1 class="page-title">
                Mes Derniers Achats
            </h1>

            <p class="page-subtitle">
                Consultez l’historique de vos achats et le statut de vos commandes.
            </p>

        </div>

        <div class="purchase-count">
            <i class="fas fa-shopping-cart me-2"></i>
            <?php echo e($recentOrders->count()); ?> Achat(s)
        </div>

    </div>

    <!-- ================= TABLE ================= -->

    <?php if($recentOrders->count() > 0): ?>

        <div class="table-card">

            <div class="table-responsive">

                <table class="table custom-table align-middle">

                    <thead>

                        <tr>
                            <th>#ID</th>
                            <th>Animal</th>
                            <th>Prix</th>
                            <th>Date</th>
                            <th>Statut</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                <td>
                                    <strong>#<?php echo e($order->id); ?></strong>
                                </td>

                                <td>

                                    <div class="pet-info">

                                        <div class="pet-icon">
                                            <i class="fas fa-paw"></i>
                                        </div>

                                        <div>

                                            <div class="pet-name">
                                                <?php echo e($order->pet->name); ?>

                                            </div>

                                            <small class="text-muted">
                                                Animal acheté
                                            </small>

                                        </div>

                                    </div>

                                </td>

                                <td>

                                    <span class="price">
                                        <?php echo e(number_format($order->total_price, 2)); ?> MAD
                                    </span>

                                </td>

                                <td>

                                    <?php echo e($order->created_at->format('d/m/Y')); ?>


                                </td>

                                <td>

                                    <?php if($order->status == 'pending'): ?>

                                        <span class="status-badge status-pending">
                                            <i class="fas fa-clock"></i>
                                            En attente
                                        </span>

                                    <?php elseif($order->status == 'completed'): ?>

                                        <span class="status-badge status-completed">
                                            <i class="fas fa-check-circle"></i>
                                            Terminé
                                        </span>

                                    <?php else: ?>

                                        <span class="status-badge status-cancelled">
                                            <i class="fas fa-times-circle"></i>
                                            Annulé
                                        </span>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>

            </div>

        </div>

    <?php else: ?>

        <!-- ================= EMPTY STATE ================= -->

        <div class="empty-state">

            <i class="fas fa-shopping-basket"></i>

            <h3>
                Aucun achat récent
            </h3>

            <p>
                Vous n'avez encore effectué aucun achat.
                Découvrez nos animaux disponibles.
            </p>

            <a href="#" class="browse-btn">

                <i class="fas fa-paw"></i>

                Explorer les animaux

            </a>

        </div>

    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layoutDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pro\composer\petSellingSystem\resources\views/dashboard/buyer/dernieres-achats.blade.php ENDPATH**/ ?>