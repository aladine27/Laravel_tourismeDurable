<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Tourist</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="<?php echo e(route('front')); ?>" class="nav-item nav-link <?php echo e(request()->routeIs('front') ? 'active' : ''); ?>">Home</a>
            <a href="<?php echo e(url('/front/destinations')); ?>" class="nav-item nav-link <?php echo e(request()->is('front/destinations') ? 'active' : ''); ?>">Destinations</a>
            <a href="<?php echo e(url('/front/events')); ?>" class="nav-item nav-link <?php echo e(request()->is('front/events') ? 'active' : ''); ?>">Events</a>
            <a href="<?php echo e(route('restaurants.list')); ?>" class="nav-item nav-link <?php echo e(request()->routeIs('restaurants.list') ? 'active' : ''); ?>">Restaurants</a>
            <a href="<?php echo e(route('trips.list')); ?>" class="nav-item nav-link <?php echo e(request()->routeIs('trips.list') ? 'active' : ''); ?>">Trips</a>
            <a href="<?php echo e(route('template.frontguide')); ?>" class="nav-item nav-link <?php echo e(request()->routeIs('template.frontguide') ? 'active' : ''); ?>">Guides</a>
            <a href="<?php echo e(route('accommodation.list-show')); ?>" class="nav-item nav-link <?php echo e(request()->routeIs('accommodation.list-show') ? 'active' : ''); ?>">Hébergements</a>
        </div>
    </div>
</nav>
<?php /**PATH D:\Xampp\htdocs\Laravel_tourismeDurable\resources\views/template/navbar.blade.php ENDPATH**/ ?>