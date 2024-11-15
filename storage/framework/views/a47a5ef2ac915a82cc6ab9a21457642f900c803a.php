




<?php $__env->startSection('content'); ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Solutions</h6>
                <h1 class="mb-5">Explore Our Destinations</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item">
                            <div class="overflow-hidden">
                                <?php if($destination->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $destination->image)); ?>" alt="<?php echo e($destination->name); ?>" style="width: 400px; height: 400px;">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo e($destination->getAddress()); ?>

                                </small>
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-calendar-alt text-primary me-2"></i><?php echo e(\Carbon\Carbon::parse($destination->date)->diffForHumans()); ?>

                                </small>
                                <small class="flex-fill text-center py-2">
                                    <i class="fa fa-user text-primary me-2"></i><?php echo e($destination->attractions->count()); ?> Attractions
                                </small>
                            </div>
                            <div class="text-center p-4">
                                <?php if($destination->attractions->isNotEmpty()): ?>
                                    <h3 class="text-danger">
                                        🎉 Il y a <?php echo e($destination->attractions->count()); ?> attraction(s) 🎉
                                    </h3>
                                    <?php $__currentLoopData = $destination->attractions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attraction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h3 class="mb-0"> <?php echo e($attraction->name); ?> de type : <?php echo e($attraction->type); ?></h3>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <h3 class="text-danger">Malheureusement, pas d'attraction</h3>
                                <?php endif; ?>

                                <div class="mb-3">
                                    <?php for($i = 0; $i < 5; $i++): ?>
                                        <small class="fa fa-star text-primary"></small>
                                    <?php endfor; ?>
                                </div>

                                <p><?php echo e($destination->description); ?></p>

                                <div class="d-flex justify-content-center mb-2">
                                    <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>








    <!-- JavaScript Libraries -->
    <script>
        document.getElementById('searchButton').addEventListener('click', function() {
            const attractionType = document.getElementById('attractionType').value;

            if (!attractionType) {
                alert("Veuillez sélectionner un type d'attraction.");
                return;
            }

            // Send an AJAX request to retrieve destinations based on the attraction type
            $.ajax({
                url: '/search', // URL of the route that returns destinations
                method: 'GET',
                data: {
                    type: attractionType

                },
                success: function(response) {
                    const destinationsContainer = document.querySelector('.row.g-4.justify-content-center');
                    destinationsContainer.innerHTML = ''; // Reset displayed results

                    if (response.destinations && response.destinations.length > 0) {
                        response.destinations.forEach(function(destination) {
                            const destinationElement = document.createElement('div');
                            destinationElement.classList.add('col-lg-4', 'col-md-6', 'wow', 'fadeInUp');
                            destinationElement.setAttribute('data-wow-delay', '0.1s');

                            // Check if attractions exist for the destination
                            const attractionsHtml = destination.attractions && destination.attractions.length > 0 ?
                                `
                                <h3 class="text-danger">
                                    🎉 Il y a ${destination.attractions.length} attraction(s) 🎉
                                </h3>
                                ${destination.attractions.map(attraction =>
                                    `<h3 class="mb-0">${attraction.name} de type : ${attraction.type}</h3>`
                                ).join('')}
                              ` :
                                `<h3 class="text-danger">Malheureusement, pas d'attraction</h3>`;

                            // Populate the HTML with destination details
                            destinationElement.innerHTML = `
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    ${destination.image
                                ? `<img src="/storage/${destination.image}" alt="${destination.name}" style="width: 400px; height: 400px;">`
                                : 'No Image'}
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-map-marker-alt text-primary me-2"></i>${destination.address}
                                    </small>
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-calendar-alt text-primary me-2"></i>${destination.date}
                                    </small>
                                </div>
                                <div class="text-center p-4">
                                    ${attractionsHtml}
                                    <div class="mb-3">
                                        ${[...Array(5)].map(() =>
                                `<small class="fa fa-star text-primary"></small>`
                            ).join('')}
                                    </div>
                                    <p>${destination.description}</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                                    </div>
                                </div>
                            </div>
                        `;
                            destinationsContainer.appendChild(destinationElement);
                        });
                    } else {
                        destinationsContainer.innerHTML = '<p>No destinations found matching the selected type.</p>';
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erreur AJAX:', error);
                    alert("Une erreur est survenue. Veuillez réessayer.");
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('template.template-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/template/destinations_list.blade.php ENDPATH**/ ?>