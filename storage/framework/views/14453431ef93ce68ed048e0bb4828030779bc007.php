<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="accommodations-content">
        <h1>Hébergements</h1>
        <a href="<?php echo e(route('accommodations.create')); ?>" class="btn btn-primary mb-3">Créer hébergement</a>

        <!-- Table to display the list of accommodations -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Prix par nuit</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $accommodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accommodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($accommodation->id); ?></td>
                    <td>
                        <a href="<?php echo e(route('accommodations.show', $accommodation)); ?>"><?php echo e($accommodation->name); ?></a>
                    </td>
                    <td><?php echo e($accommodation->getAddress()); ?></td>
                    <td><?php echo e($accommodation->price_per_night); ?> DT</td>
                    <td>
                        <!-- Button to edit the accommodation -->
                        <a href="<?php echo e(route('accommodations.edit', $accommodation)); ?>" class="btn btn-warning btn-sm">Modifier</a>

                        <!-- Form to delete the accommodation -->
                        <form action="<?php echo e(route('accommodations.destroy', $accommodation)); ?>" method="POST" style="display: inline;">
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
        .accommodations-content {
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
<?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/accommodations/index.blade.php ENDPATH**/ ?>