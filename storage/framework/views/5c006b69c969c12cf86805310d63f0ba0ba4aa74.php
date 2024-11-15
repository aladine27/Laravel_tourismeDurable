


<?php $__env->startSection('content'); ?>
    <!-- Navbar & En-tête Début -->
    <div class="container-fluid position-relative p-0 bg-white text-primary">

        <div class="text-primary bg-white  hero-header">
            <div class="py-1 bg-white">
                <div class="row justify-content-center py-1 bg-white">
                    <div class="pt-lg-5 mt-lg-5 text-center bg-white">
                        <h1 class="display-3 text-primary mb-3 animated slideInDown">Découvrez Nos Restaurants</h1>
                        <p class="fs-4 text-primary mb-4 animated slideInDown">Trouvez les meilleurs endroits pour manger et savourer vos repas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & En-tête Fin -->

    <!-- Restaurants Début -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Partenaires</h6>
                <h1 class="mb-5">Choix de Restaurants</h1>
                <!-- Ajouter le bouton "Mes Réservations" -->
                <div class="text-center mb-4">
                    <a href="<?php echo e(route('reservations.list')); ?>" class="btn btn-secondary">Mes Réservations</a>
                </div>
            </div>
            <div class="row g-3">
                <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative d-block overflow-hidden" style="height: 300px;">
                            <?php if($restaurant->restaurant_image): ?>
                                <img class="img-fluid w-100 h-100" src="<?php echo e(asset('storage/' . $restaurant->restaurant_image)); ?>" alt="<?php echo e($restaurant->name); ?>" style="object-fit: cover;">
                            <?php else: ?>
                                <img class="img-fluid w-100 h-100" src="<?php echo e(asset('images/img/default-restaurant.jpg')); ?>" alt="<?php echo e($restaurant->name); ?>" style="object-fit: cover;">
                            <?php endif; ?>
                            <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2"><?php echo e($restaurant->name); ?></div>
                        </div>
                        <div class="text-center mt-3">
                            <!-- Button to show restaurant details -->
                            <a href="<?php echo e(route('restaurants.details', $restaurant->id)); ?>" class="btn btn-warning">Voir les Informations</a>
                            <a href="<?php echo e(route('restaurants.showReservationForm', $restaurant->id)); ?>" class="btn btn-primary">Faire une Réservation</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- Restaurants Fin -->
<?php $__env->stopSection(); ?>




<?php echo $__env->make('template.template-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/template/restaurent/list.blade.php ENDPATH**/ ?>