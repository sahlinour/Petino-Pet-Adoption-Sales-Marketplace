

<?php $__env->startSection('content'); ?>

<style>

    /* ================= PAGE ================= */

    .annonce-page{
        animation:showUp .5s ease;
    }

    @keyframes showUp{
        from{
            opacity:0;
            transform:translateY(25px);
        }
        to{
            opacity:1;
            transform:translateY(0);
        }
    }

    /* ================= HEADER ================= */

    .annonce-header{

        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;

        margin-bottom:35px;
    }

    .annonce-title{

        font-size:38px;
        font-weight:800;

        color:var(--dark);

        margin-bottom:8px;
    }

    .annonce-subtitle{

        color:var(--text-soft);

        font-size:15px;
    }

    .header-badge{

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:white;

        padding:14px 24px;

        border-radius:18px;

        font-weight:700;

        box-shadow:var(--shadow-sm);
    }

    /* ================= FORM WRAPPER ================= */

    .annonce-wrapper{

        background:rgba(255,255,255,.78);

        backdrop-filter:blur(18px);

        border-radius:40px;

        overflow:hidden;

        box-shadow:var(--shadow-md);

        display:grid;

        grid-template-columns:340px 1fr;
    }

    /* ================= LEFT SIDE ================= */

    .left-side{

        background:linear-gradient(
            180deg,
            var(--blue),
            var(--dark)
        );

        padding:40px 30px;

        position:relative;

        overflow:hidden;

        color:white;
    }

    .left-side::before{

        content:"";

        position:absolute;

        top:-80px;
        right:-80px;

        width:220px;
        height:220px;

        border-radius:50%;

        background:rgba(255,255,255,.08);
    }

    .left-side::after{

        content:"";

        position:absolute;

        bottom:-100px;
        left:-100px;

        width:260px;
        height:260px;

        border-radius:50%;

        background:rgba(255,255,255,.05);
    }

    .left-icon{

        width:85px;
        height:85px;

        border-radius:26px;

        background:rgba(255,255,255,.15);

        display:flex;
        align-items:center;
        justify-content:center;

        font-size:34px;

        margin-bottom:28px;

        backdrop-filter:blur(12px);
    }

    .left-title{

        font-size:28px;
        font-weight:800;

        margin-bottom:15px;
    }

    .left-text{

        line-height:1.8;

        color:rgba(255,255,255,.85);

        font-size:15px;
    }

    .tips-box{

        margin-top:35px;

        background:rgba(255,255,255,.08);

        border-radius:24px;

        padding:22px;
    }

    .tips-box h5{

        font-size:18px;
        font-weight:700;

        margin-bottom:15px;
    }

    .tips-box ul{

        padding-left:18px;

        margin:0;
    }

    .tips-box li{

        margin-bottom:10px;

        color:rgba(255,255,255,.82);
    }

    /* ================= FORM SIDE ================= */

    .right-side{

        padding:40px;
    }

    /* ================= FORM GRID ================= */

    .form-grid{

        display:grid;

        grid-template-columns:1fr 1fr;

        gap:24px;
    }

    .full-width{

        grid-column:1 / -1;
    }

    /* ================= LABEL ================= */

    .form-label{

        display:block;

        margin-bottom:10px;

        color:var(--dark);

        font-weight:700;
    }

    /* ================= INPUT ================= */

    .form-control{

        border:none;

        background:#f4f7fb;

        border-radius:20px;

        padding:16px 18px;

        font-weight:500;

        transition:var(--transition);
    }

    .form-control:focus{

        background:white;

        box-shadow:
            0 0 0 5px rgba(101,148,177,.16);

        transform:translateY(-2px);
    }

    textarea.form-control{

        resize:none;
    }

    /* ================= BUTTON ================= */

    .publish-btn{

        border:none;

        background:linear-gradient(
            135deg,
            var(--blue),
            var(--pink)
        );

        color:white;

        width:100%;

        padding:18px;

        border-radius:22px;

        font-weight:700;

        font-size:16px;

        transition:var(--transition);

        box-shadow:var(--shadow-sm);

        margin-top:10px;
    }

    .publish-btn:hover{

        transform:translateY(-4px);

        box-shadow:var(--shadow-lg);
    }

    /* ================= ERROR ================= */

    .error-msg{

        display:block;

        margin-top:8px;

        color:#dc3545;

        font-size:14px;

        font-weight:600;
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:1100px){

        .annonce-wrapper{

            grid-template-columns:1fr;
        }
    }

    @media(max-width:768px){

        .form-grid{

            grid-template-columns:1fr;
        }

        .right-side{

            padding:25px;
        }

        .left-side{

            padding:30px 25px;
        }

        .annonce-title{

            font-size:28px;
        }
    }

</style>

<div class="annonce-page">

    <!-- ================= HEADER ================= -->

    <div class="annonce-header">

        <div>

            <h1 class="annonce-title">
                Ajouter une Annonce
            </h1>

            <p class="annonce-subtitle">
                Publiez votre animal et trouvez rapidement un acheteur.
            </p>

        </div>

        <div class="header-badge">

            <i class="fas fa-paw me-2"></i>

            New Listing

        </div>

    </div>

    <!-- ================= CONTENT ================= -->

    <div class="annonce-wrapper">

        <!-- LEFT SIDE -->

        <div class="left-side">

            <div class="left-icon">
                <i class="fas fa-bullhorn"></i>
            </div>

            <h2 class="left-title">
                Créer une annonce premium
            </h2>

            <p class="left-text">
                Ajoutez les informations de votre animal pour améliorer
                la visibilité de votre annonce et attirer plus d’acheteurs.
            </p>

            <div class="tips-box">

                <h5>
                    Conseils
                </h5>

                <ul>
                    <li>Ajoutez un titre clair</li>
                    <li>Décrivez l’animal précisément</li>
                    <li>Indiquez un prix réaliste</li>
                    <li>Choisissez le bon statut</li>
                </ul>

            </div>

        </div>

        <!-- RIGHT SIDE -->

        <div class="right-side">

            <form method="POST"
                action="<?php echo e(route('seller.listings.store')); ?>">

                <?php echo csrf_field(); ?>

                <div class="form-grid">

                    <!-- PET -->

                    <div class="full-width">

                        <label class="form-label">
                            Choisir un animal
                        </label>

                        <select name="pet_id"
                            class="form-control <?php $__errorArgs = ['pet_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>

                            <option value="">
                                Choose Pet
                            </option>

                            <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e($pet->id); ?>"
                                    <?php echo e(old('pet_id') == $pet->id ? 'selected' : ''); ?>>

                                    <?php echo e($pet->name); ?>


                                </option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>

                        <?php $__errorArgs = ['pet_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-msg">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <!-- TITLE -->

                    <div class="full-width">

                        <label class="form-label">
                            Titre de l'annonce
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Listing title"
                            value="<?php echo e(old('title')); ?>"
                            required
                        >

                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-msg">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <!-- DESCRIPTION -->

                    <div class="full-width">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Description"
                        ><?php echo e(old('description')); ?></textarea>

                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-msg">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <!-- PRICE -->

                    <div>

                        <label class="form-label">
                            Prix
                        </label>

                        <input
                            type="number"
                            name="price"
                            class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Price"
                            value="<?php echo e(old('price')); ?>"
                        >

                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-msg">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <!-- STATUS -->

                    <div>

                        <label class="form-label">
                            Statut
                        </label>

                        <select
                            name="status"
                            class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                            <option value="sold">Sold</option>
                            <option value="expired">Expired</option>

                        </select>

                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-msg">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <!-- LOCATION -->

                    <div class="full-width">

                        <label class="form-label">
                            Localisation
                        </label>

                        <input
                            type="text"
                            name="location"
                            class="form-control <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Location"
                            value="<?php echo e(old('location')); ?>"
                        >

                        <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-msg">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <!-- BUTTON -->

                    <div class="full-width">

                        <button type="submit" class="publish-btn">

                            <i class="fas fa-paper-plane me-2"></i>

                            Publier l'annonce

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layoutDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pro\composer\petSellingSystem\resources\views/dashboard/seller/add-annonce.blade.php ENDPATH**/ ?>