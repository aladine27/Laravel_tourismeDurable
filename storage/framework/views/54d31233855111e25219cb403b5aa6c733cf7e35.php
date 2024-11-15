


<?php $__env->startSection('content'); ?>
    <div class="container-fluid position-relative p-0 bg-white text-primary">

        <div class="text-primary bg-white  hero-header">
            <div class="py-1 bg-white">
                <div class="row justify-content-center py-1 bg-white">
                    <div class="pt-lg-5 mt-lg-5 text-center bg-white">
                        <h1 class="display-3 text-primary mb-3 animated slideInDown">Détails du Restaurant</h1>
                        <p class="fs-4 text-primary mb-4 animated slideInDown">Découvrez plus d'informations sur le restaurant <?php echo e($restaurant->name); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Restaurant Détails Début -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <!-- Restaurant Image -->
                <div class="col-lg-6">
                    <div class="position-relative d-block overflow-hidden">
                        <?php if($restaurant->restaurant_image): ?>
                            <img class="img-fluid w-100 h-100" src="<?php echo e(asset('storage/' . $restaurant->restaurant_image)); ?>" alt="<?php echo e($restaurant->name); ?>" style="object-fit: cover;">
                        <?php else: ?>
                            <img class="img-fluid w-100 h-100" src="<?php echo e(asset('images/img/default-restaurant.jpg')); ?>" alt="<?php echo e($restaurant->name); ?>" style="object-fit: cover;">
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Restaurant Info -->
                <div class="col-lg-6">
                    <h3><?php echo e($restaurant->name); ?></h3>
                    <p><strong>Adresse:</strong> <?php echo e($restaurant->address); ?></p>
                    <p><strong>Type de Cuisine:</strong> <?php echo e($restaurant->cuisine_type); ?></p>

                    <!-- Menus with Images -->
                    <h4>Menus Disponibles</h4>
                    <div class="row">
                        <?php $__currentLoopData = $restaurant->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="menu-item">
                                    <?php if($menu->photo): ?>
                                        <img class="img-fluid w-100" src="<?php echo e(asset('storage/' . $menu->photo)); ?>" alt="<?php echo e($menu->name); ?>" style="object-fit: cover;">
                                    <?php else: ?>
                                        <img class="img-fluid w-100" src="<?php echo e(asset('images/img/default-menu.jpg')); ?>" alt="<?php echo e($menu->name); ?>">
                                    <?php endif; ?>
                                    <h5><?php echo e($menu->name); ?></h5>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Add Reservation Button -->
                    <a href="<?php echo e(route('restaurants.showReservationForm', $restaurant->id)); ?>" class="btn btn-primary mt-3">Faire une Réservation</a>
                    <a href="<?php echo e(route('restaurants.list')); ?>" class="btn btn-warning mt-3">Retour à la Liste des Restaurants</a>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('template.template-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/template/restaurent/details.blade.php ENDPATH**/ ?>