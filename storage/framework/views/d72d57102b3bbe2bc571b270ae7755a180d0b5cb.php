<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="events-content">
        <h1>Events</h1>
        <a href="<?php echo e(route('events.create')); ?>" class="btn btn-primary mb-3">Create Event</a>

        <!-- Table to display the list of events -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($event->id); ?></td>
                        <td>
                            <a href="<?php echo e(route('events.show', $event)); ?>"><?php echo e($event->name); ?></a>
                        </td>
                        <td class="text-wrap"><?php echo e($event->description); ?></td> <!-- Add class for word wrapping -->
                        <td><?php echo e(\Carbon\Carbon::parse($event->date)->format('d-m-Y')); ?></td>
                        <td class="text-wrap"><?php echo e($event->getAddress()); ?></td> <!-- Use the getAddress method -->
                        <td>
                            <!-- Button to edit the event -->
                            <a href="<?php echo e(route('events.edit', $event)); ?>" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Form to delete the event -->
                            <form action="<?php echo e(route('events.destroy', $event)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <style>
        .events-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        /* Add styles for word wrapping */
        .text-wrap {
            white-space: normal; /* Allows text to wrap */
            word-wrap: break-word; /* Breaks long words */
            max-width: 200px; /* Set a maximum width for the cell */
        }

        /* Optional: Adjust the table to handle overflow better */
        table {
            table-layout: auto; /* Let the browser decide the layout */
            width: 100%; /* Full width */
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\Users\serin\Desktop\4TWIN\5TWIN\LARAVEL\Laravel_RescuFood\resources\views/events/index.blade.php ENDPATH**/ ?>