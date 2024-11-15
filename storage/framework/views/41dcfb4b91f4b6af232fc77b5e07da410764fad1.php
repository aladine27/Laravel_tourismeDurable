<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="restaurant-content">
        <div class="header-section">
            <h1>Liste des Restaurants</h1>
            <a href="<?php echo e(route('restaurants.create')); ?>" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Créer un Restaurant
            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="row">
            <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4"> <!-- Adjust the column size as needed -->
                    <div class="card h-100 shadow-sm"> <!-- Add h-100 class to make all cards the same height -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo e($restaurant->name); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo e($restaurant->cuisine_type); ?></h6>
                            <div class="restaurant-image mb-3">
                                <?php if($restaurant->restaurant_image): ?>
                                    <img src="<?php echo e(asset('storage/' . $restaurant->restaurant_image)); ?>" alt="Restaurant Image" class="img-fluid fixed-size-image rounded">
                                <?php else: ?>
                                    <p>Aucune image disponible</p>
                                <?php endif; ?>
                            </div>
                            <p class="card-text"><?php echo e(preg_replace('/.*?,\s*([^,]+),\s*.*$/', '$1', $restaurant->address)); ?></p>
                            <div class="mt-auto d-flex flex-wrap justify-content-start"> <!-- Push buttons to the bottom and align them -->
                                <a href="<?php echo e(route('restaurants.show', $restaurant->id)); ?>" class="btn btn-info btn-sm mb-2 me-2">
                                    <i class="fas fa-eye"></i> Voir
                                </a>
                                <a href="<?php echo e(route('restaurants.edit', $restaurant->id)); ?>" class="btn btn-warning btn-sm mb-2 me-2">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <form action="<?php echo e(route('restaurants.destroy', $restaurant->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm mb-2 me-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce restaurant ?');">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                                <?php if($restaurant->menus()->exists()): ?>
                                    <a href="<?php echo e(route('menus.show', $restaurant->menus->first()->id)); ?>" class="btn btn-info btn-sm mb-2 me-2">
                                        <i class="fas fa-utensils"></i> Voir Menu
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('menus.create', ['restaurant_id' => $restaurant->id])); ?>" class="btn btn-primary btn-sm mb-2 me-2">
                                        <i class="fas fa-plus"></i> Créer Menu
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <style>
        .restaurant-content {
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-section h1 {
            margin: 0;
            font-size: 2rem;
            color: #333;
        }

        .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .btn {
            margin-right: 5px; /* Add some space between buttons */
        }

        .btn i {
            margin-right: 5px;
        }

        .fixed-size-image {
            width: 100%; /* Set the width to 100% of the container */
            height: 200px; /* Set a fixed height */
            object-fit: cover; /* Ensure the image covers the entire area */
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/restaurants/index.blade.php ENDPATH**/ ?>