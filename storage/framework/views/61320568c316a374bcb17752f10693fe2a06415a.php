


<?php $__env->startSection('content'); ?>
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Solutions</h6>
            <h1 class="mb-5">Explore Our Events</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">

                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo e($event->getAddress()); ?>

                            </small>
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-calendar-alt text-primary me-2"></i><?php echo e(\Carbon\Carbon::parse($event->date)->diffForHumans()); ?>

                            </small>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-user text-primary me-2"></i><?php echo e($event->tickets->count()); ?> Person
                            </small>
                        </div>
                        <div class="text-center p-4">
                        <?php $__currentLoopData = $event->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h3 class="mb-0"> <?php echo e($ticket->type); ?> $<?php echo e(number_format($ticket->price, 2)); ?></h3>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <div class="mb-3">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <small class="fa fa-star text-primary"></small>
                                <?php endfor; ?>
                            </div>
                            <p><?php echo e($event->description); ?></p>
                            <div class="d-flex justify-content-center mb-2">

                                <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('template.template-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/template/events_list.blade.php ENDPATH**/ ?>