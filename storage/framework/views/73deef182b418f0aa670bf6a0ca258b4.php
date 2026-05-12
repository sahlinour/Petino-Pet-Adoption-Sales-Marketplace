

<?php $__env->startSection('title', 'Pets List'); ?>

<?php $__env->startSection('content'); ?>


<section class="happy-section fade-in">
  <div class="wrap">
    <div class="happy__grid">

      <!-- Left: image -->
      <div class="happy__visual">
        <div class="happy__img-frame">
          <img src="<?php echo e(asset('images/headshot-happy-smiling-dark-skinned-afro-american-woman-holds-nice-breed-dog-expresses-positive-emotions-has-dreamy-expression-going-have-walk-with-favorite-pet-people-animals-concept.jpg')); ?>" alt="Happy pets">
        </div>
        <div class="happy__pill hp-a">🐶 2.4K+ Pets Adopted</div>
        <div class="happy__pill hp-b">⭐ 98% Happy Owners</div>
      </div>

      <!-- Right: text -->
      <div class="happy__text">
        <div class="cat__intro">
        <span class="label-tag">🐶 Explore</span>
        <h2 class="section-heading">Find Your Dream Pet Today</h2>
        <p class="section-sub">
           Explore adorable dogs, cats, birds and more.
           Healthy pets from trusted sellers waiting for a loving home.
        </p>
        <div class="cat__tags">
          <div class="cat__tag">🐕 Dogs</div>
          <div class="cat__tag">🐈 Cats</div>
          <div class="cat__tag">🐦 Birds</div>
          <div class="cat__tag">🐇 Rabbits
            
          </div>
        </div>
        <a href="#" class="btn btn-action">Browse Pets →</a>
      </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= FILTERS ================= -->
<section class="pets-filters container">
    <form method="GET" action="<?php echo e(route('pets')); ?>" class="filters-form grid-filters">
        <!-- Category Filter -->
        <div class="filter-group">
            <i class="fas fa-paw"></i>
            <select name="category" id="category">
                <option value="">All Categories</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                        <?php echo e(ucfirst($category->name)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Breed Filter -->
        <div class="filter-group">
            <i class="fas fa-search"></i>
            <input type="text" name="breed" id="breed" value="<?php echo e(request('breed')); ?>" placeholder="Breed">
        </div>

        <!-- Max Price Filter -->
        <div class="filter-group">
            <i class="fas fa-dollar-sign"></i>
            <input type="number" name="price" id="price" value="<?php echo e(request('price')); ?>" placeholder="Max Price">
        </div>

        <!-- Max Age Filter -->
        <div class="filter-group">
            <i class="fas fa-calendar-alt"></i>
            <input type="number" name="age" id="age" value="<?php echo e(request('age')); ?>" placeholder="Max Age">
        </div>

        <!-- Submit Button -->
        <div class="filter-group">
            <button type="submit" class="btn-filter">
                <i class="fas fa-filter"></i> Apply Filters
            </button>
        </div>
    </form>
</section>

<!-- ================= LISTINGS GRID DYNAMIQUE ================= -->
<section class="pets-list container" id="pets-list">
    
    <div class="pets-grid">

        <?php $__empty_1 = true; $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <div class="pet-card">

            <div class="pet-card__image">

                <img src="<?php echo e(asset('storage/' . $listing->pet->image)); ?>"
                     alt="<?php echo e($listing->pet->name); ?>">

                <span class="pet-type <?php echo e(strtolower($listing->status)); ?>">
                    <?php echo e(ucfirst($listing->status)); ?>

                </span>

            </div>

            <div class="pet-card__content">

                <h3><?php echo e($listing->title); ?></h3>

                <p>
                    <?php echo e(Str::limit($listing->description, 80)); ?>

                </p>

                <span class="price">
                    <?php echo e($listing->price); ?> MAD
                </span>

                <a href="<?php echo e(route('pets.petsShow', $listing->pet->id)); ?>"
                   class="btn-details">

                    View Details

                </a>

            </div>

        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <p>No listings found.</p>

        <?php endif; ?>

    </div>

    <!-- Pagination -->
    <?php if($listings->lastPage() > 1): ?>

    <nav class="custom-pagination">

        <ul>

            
            <?php if($listings->onFirstPage()): ?>

                <li class="disabled">&laquo;</li>

            <?php else: ?>

                <li>
                    <a href="<?php echo e($listings->previousPageUrl()); ?>">
                        &laquo;
                    </a>
                </li>

            <?php endif; ?>

            
            <?php for($i = 1; $i <= $listings->lastPage(); $i++): ?>

                <li class="<?php echo e($listings->currentPage() == $i ? 'active' : ''); ?>">

                    <a href="<?php echo e($listings->url($i)); ?>">
                        <?php echo e($i); ?>

                    </a>

                </li>

            <?php endfor; ?>

            
            <?php if($listings->hasMorePages()): ?>

                <li>
                    <a href="<?php echo e($listings->nextPageUrl()); ?>">
                        &raquo;
                    </a>
                </li>

            <?php else: ?>

                <li class="disabled">&raquo;</li>

            <?php endif; ?>

        </ul>

    </nav>

    <?php endif; ?>

</section>

<!-- ══════════════════════════════════════
     ⑥ PROMO BANNERS
══════════════════════════════════════ -->
<section class="promo-section fade-in">
  <div class="promo__heading">
    <span class="label-tag">🐾 Find Your New Best Friend </span>
    <h2 class="section-heading">Ready to <br> Welcome  a Loving Pet Home?</h2>
  </div>
    
    <div class="promo-card__title">
        Discover adorable pets waiting for care, love, and a happy family.
        Start your journey today and meet your perfect companion.
       <br>
        <a href="#" class="btn btn-action">Join Now →</a>
      </div>
   
  
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layoutPets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pro\composer\petSellingSystem\resources\views/pages/petsList.blade.php ENDPATH**/ ?>