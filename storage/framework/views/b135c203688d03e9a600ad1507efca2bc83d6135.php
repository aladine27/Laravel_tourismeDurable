<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="booking-content">
        <h1>Créer Réservation</h1>

        <form action="<?php echo e(route('bookings.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <!-- Accommodation Selection -->
            <div class="mb-3">
                <label for="accommodation_id" class="form-label">Hébergement</label>
                <select name="accommodation_id" id="accommodation_id" class="form-control" required>
                    <option value="" disabled selected>Selectionner un hébergement</option>
                    <?php $__currentLoopData = $accommodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accommodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($accommodation->id); ?>"><?php echo e($accommodation->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Check-in Date -->
            <div class="mb-3">
                <label for="check_in" class="form-label">Check-in Date</label>
                <input type="date" name="check_in_date" id="check_in" class="form-control" required>
            </div>

            <!-- Check-out Date -->
            <div class="mb-3">
                <label for="check_out" class="form-label">Check-out Date</label>
                <input type="date" name="check_out_date" id="check_out" class="form-control" required>
            </div>



            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Créer réservation</button>
                <a href="<?php echo e(route('bookings.index')); ?>" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <style>
        .booking-content {
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
<?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/bookings/create.blade.php ENDPATH**/ ?>