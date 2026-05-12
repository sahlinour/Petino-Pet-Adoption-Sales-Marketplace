<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Pets'); ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS global -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <!-- CSS spécifique Pets -->
    <link rel="stylesheet" href="<?php echo e(asset('css/stylePets.css')); ?>">

    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

    
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <main class="pets-main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\pro\composer\petSellingSystem\resources\views/layouts/layoutPets.blade.php ENDPATH**/ ?>