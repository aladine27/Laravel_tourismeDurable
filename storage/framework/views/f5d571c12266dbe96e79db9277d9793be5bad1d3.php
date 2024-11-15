<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="Attraction-content mt-4">
        <h1>Create Attraction</h1>

        <form action="<?php echo e(route('attractions.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label for="name" class="form-label">Attraction Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="" disabled selected>Choisir un type d'attraction</option>
                    <option value="Culturelle">Culturelle</option>
                    <option value="Naturelle">Naturelle</option>
                    <option value="Historique">Historique</option>
                    <option value="Aventure">Aventure</option>
                    <option value="Religieuse">Religieuse</option>
                    <option value="Éducative">Éducative</option>
                    <option value="Ludique">Ludique</option>
                    <option value="Gastronomique">Gastronomique</option>
                    <option value="Sportive">Sportive</option>
                </select>
            </div>



            <div>
                <label for="destination_id">Destination</label>
                <select name="destination_id" id="destination_id" required>
                    <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($destination->id); ?>"><?php echo e($destination->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create Attraction</button>
                <a href="<?php echo e(route('attractions.index')); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([36.8065, 10.1815], 13); // Default to Tokyo

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            const marker = L.marker([10.1815, 10.1815]).addTo(map); // Default marker

            map.on('click', function(e) {
                const lat = e.latlng.lat;
                const lng = e.latlng.lng;
                marker.setLatLng([lat, lng]);
                document.getElementById('location').value = JSON.stringify({
                    lat: lat,
                    lng: lng
                });
            });
        });
    </script>

    <style>
        .event-content {
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
<?php endif; ?><?php /**PATH C:\Users\MSI\Desktop\5eme\Laravel\projet\Laravel_RescuFood\resources\views/attractions/create.blade.php ENDPATH**/ ?>