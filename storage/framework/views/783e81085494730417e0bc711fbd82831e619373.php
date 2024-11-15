<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="tours-content">
        <h1>Liste des Visites</h1>
        <a href="<?php echo e(route('tours.create')); ?>" class="btn btn-primary mb-3">Ajouter une Visite</a>

        <!-- Tableau pour afficher la liste des visites -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>  <!-- Nouvelle colonne pour la description -->
                    <th>Date</th>
                    <th>Durée (heures)</th>  <!-- Nouvelle colonne pour la durée -->
                    <th>Prix</th>  <!-- Nouvelle colonne pour le prix -->
                    <th>nbPlace</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($tour->id); ?></td>
                        <td>
                            <a href="<?php echo e(route('tours.show', $tour)); ?>"><?php echo e($tour->title); ?></a>
                        </td>
                        <td><?php echo e($tour->description); ?></td>  <!-- Affichage de la description -->
                        <td><?php echo e(\Carbon\Carbon::parse($tour->date)->format('d-m-Y')); ?></td>
                        <td><?php echo e($tour->duration); ?></td>  <!-- Affichage de la durée -->
                        <td><?php echo e(number_format($tour->price, 2, ',', ' ')); ?> €</td>  <!-- Affichage du prix avec format -->
                        <td><?php echo e($tour->nb_place); ?></td>
                        <td>
                            <!-- Bouton pour modifier la visite -->
                            <a href="<?php echo e(route('tours.edit', $tour)); ?>" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Formulaire pour supprimer la visite -->
                            <form action="<?php echo e(route('tours.destroy', $tour)); ?>" method="POST" style="display: inline;">
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
        .tours-content {
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
<?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/tours/index.blade.php ENDPATH**/ ?>