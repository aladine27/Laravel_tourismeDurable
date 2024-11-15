


<?php $__env->startSection('content'); ?>
    <!-- Hero Section Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Meet Our Professional Guides</h1>
                    <p class="fs-4 text-white mb-4 animated slideInDown">Explore the world with experienced and skilled guides.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Guides Section Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Our Guides</h6>
                <h1 class="mb-5">Meet Our Amazing Guides</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php $__currentLoopData = $guides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item">
                            <div class="text-center p-4">
                                <img src="<?php echo e(asset('images/guides/' . $guide->image)); ?>" alt="<?php echo e($guide->name); ?>" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                                <h3><?php echo e($guide->name); ?></h3>
                                <p><strong>Experience:</strong> <?php echo e($guide->experience_years); ?> years</p>
                                <p><strong>Email:</strong> <?php echo e($guide->email); ?></p>
                                <p><strong>Phone:</strong> <?php echo e($guide->phone); ?></p>
                                <div class="text-center mt-3">
                                    <a href="<?php echo e(route('guide_tours', ['guideId' => $guide->id])); ?>">Voir les tours</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- Guides Section End -->
<?php $__env->stopSection(); ?>





<?php echo $__env->make('template.template-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/template/frontguide.blade.php ENDPATH**/ ?>