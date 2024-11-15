<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="tickets-content">
        <h1>Tickets</h1>
        <a href="<?php echo e(route('tickets.create')); ?>" class="btn btn-primary mb-3">Create Ticket</a>

        <!-- Container for the ticket cards -->
        <div class="row">
            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-3"> <!-- Use Bootstrap columns for responsive design -->
                    <div class="card ticket-card">
                        <div class="card-body">
                            <h5 class="card-title">Ticket ID: <?php echo e($ticket->id); ?></h5>
                            <p class="card-text">Event: <?php echo e($ticket->event->name); ?></p>
                            <p class="card-text">Price: $<?php echo e(number_format($ticket->price, 2)); ?></p>
                            <div class="d-flex justify-content-between">
                                <a href="<?php echo e(route('tickets.edit', $ticket)); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?php echo e(route('tickets.destroy', $ticket)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <style>
        .tickets-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .ticket-card {
            border: 1px solid #007bff; /* Add a border color for the ticket card */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
            transition: transform 0.2s; /* Animation on hover */
        }

        .ticket-card:hover {
            transform: scale(1.05); /* Scale up on hover */
        }

        /* Optional: Adjust card styling */
        .card-title {
            font-weight: bold;
        }
        
        .card-text {
            margin: 0; /* Remove default margin */
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\Users\serin\Desktop\4TWIN\5TWIN\LARAVEL\Laravel_RescuFood\resources\views/tickets/index.blade.php ENDPATH**/ ?>