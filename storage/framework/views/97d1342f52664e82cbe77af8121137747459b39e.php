

<div id="loading">
    <?php echo $__env->make('partials.dashboard._body_loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="wrapper">
    <?php echo e($slot); ?>

</div>
<?php echo $__env->make('partials.dashboard._body_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.dashboard._scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\serin\Desktop\4TWIN\5TWIN\LARAVEL\Laravel_RescuFood\resources\views/partials/dashboard/_body7.blade.php ENDPATH**/ ?>