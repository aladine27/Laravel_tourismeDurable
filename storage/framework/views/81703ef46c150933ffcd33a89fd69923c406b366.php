<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>" />
        
        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> -->

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/libs.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/hope-ui.css?v=1.0')); ?>">
        <!-- remixicon -->
        <!-- <link rel="stylesheet" href="<?php echo e(asset('vendor/remixicon/fonts/remixicon.css')); ?>"/> -->

    </head>
    <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
        <div id="loading">
            <?php echo $__env->make('partials.dashboard._body_loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.dashboard._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="wrapper">
            <?php echo e($slot); ?>

        </div>
         <?php echo $__env->make('partials.dashboard._scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/layouts/dashboard/guest.blade.php ENDPATH**/ ?>