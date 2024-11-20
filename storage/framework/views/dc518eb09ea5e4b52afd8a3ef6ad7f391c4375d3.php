<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="bookings-content">
        <h1>Réservations</h1>
        <a href="<?php echo e(route('bookings.create')); ?>" class="btn btn-primary mb-3">Créer Réservation</a>

        <!-- Table to display the list of bookings -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom d'hébergement</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Prix total</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($booking->id); ?></td>
                    <td>
                        <a href="<?php echo e(route('accommodations.show', $booking->accommodation)); ?>"><?php echo e($booking->accommodation->name); ?></a>
                    </td>
                    <td><?php echo e(\Carbon\Carbon::parse($booking->check_in_date)->format('d M Y')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($booking->check_out_date)->format('d M Y')); ?></td>
                    <td><?php echo e($booking->total_price); ?> DT</td>
                    <td>
                        <!-- Button to edit the booking -->
                        <a href="<?php echo e(route('bookings.edit', $booking)); ?>" class="btn btn-warning btn-sm">Modifier</a>

                        <!-- Form to delete the booking -->
                        <form action="<?php echo e(route('bookings.destroy', $booking)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <style>
        .bookings-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\Users\serin\Desktop\4TWIN\5TWIN\LARAVEL\Laravel_RescuFood\resources\views/bookings/index.blade.php ENDPATH**/ ?>