<?php $__env->startSection('content'); ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">All Accomodations</h6>
                <h1 class="mb-5">Explore Our Accomodations</h1>
            </div>

            <div class="row g-4 justify-content-center">
                <?php $__currentLoopData = $accomodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Accomodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item border">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo e(asset('images/img/package-1.jpg')); ?>" alt="<?php echo e($Accomodation->name); ?>">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo e($Accomodation->getAddress()); ?>

                                </small>
                            </div>
                            <div class="text-center p-4">
                                <h3 class="mb-0"><?php echo e(number_format($Accomodation->price_per_night, 2)); ?> DT</h3>
                                <div class="mb-3">
                                    <?php for($i = 0; $i < 5; $i++): ?>
                                        <small class="fa fa-star text-primary"></small>
                                    <?php endfor; ?>
                                </div>
                                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam eos.</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="#" class="btn btn-sm btn-primary px-6 border-end" style="border-radius:0;">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.template-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/template/hebergements/list.blade.php ENDPATH**/ ?>