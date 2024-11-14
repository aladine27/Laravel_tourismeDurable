<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Restaurant - {{ $restaurant->name }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('images/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Début -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Chargement...</span>
        </div>
    </div>
    <!-- Spinner Fin -->

    <!-- Navbar & En-tête Début -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Touriste</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('front') }}" class="nav-item nav-link">Accueil</a>
                    <a href="" class="nav-item nav-link">Destinations</a>
                    <a href="{{ url('/front/events') }}" class="nav-item nav-link">Événements</a>
                    <a href="{{ route('restaurants.list') }}" class="nav-item nav-link">Restaurants</a>
                    <a href="{{ route('trips.list') }}" class="nav-item nav-link">Voyages</a>
                    <a href="" class="nav-item nav-link">Hébergement</a>
                    <a href="" class="nav-item nav-link">Guides</a>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Détails du Restaurant</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">Découvrez plus d'informations sur le restaurant {{ $restaurant->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & En-tête Fin -->

    <!-- Restaurant Détails Début -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <!-- Restaurant Image -->
                <div class="col-lg-6">
                    <div class="position-relative d-block overflow-hidden">
                        @if($restaurant->restaurant_image)
                            <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $restaurant->restaurant_image) }}" alt="{{ $restaurant->name }}" style="object-fit: cover;">
                        @else
                            <img class="img-fluid w-100 h-100" src="{{ asset('images/img/default-restaurant.jpg') }}" alt="{{ $restaurant->name }}" style="object-fit: cover;">
                        @endif
                    </div>
                </div>
                <!-- Restaurant Info -->
                <div class="col-lg-6">
                    <h3>{{ $restaurant->name }}</h3>
                    <p><strong>Adresse:</strong> {{ $restaurant->address }}</p>
                    <p><strong>Type de Cuisine:</strong> {{ $restaurant->cuisine_type }}</p>

                    <!-- Menus with Images -->
                    <h4>Menus Disponibles</h4>
                    <div class="row">
                        @foreach($restaurant->menus as $menu)
                            <div class="col-md-4">
                                <div class="menu-item">
                                    @if($menu->photo)
                                        <img class="img-fluid w-100" src="{{ asset('storage/' . $menu->photo) }}" alt="{{ $menu->name }}" style="object-fit: cover;">
                                    @else
                                        <img class="img-fluid w-100" src="{{ asset('images/img/default-menu.jpg') }}" alt="{{ $menu->name }}">
                                    @endif
                                    <h5>{{ $menu->name }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Add Reservation Button -->
                    <a href="{{ route('restaurants.showReservationForm', $restaurant->id) }}" class="btn btn-primary mt-3">Faire une Réservation</a>
                    <a href="{{ route('restaurants.list') }}" class="btn btn-warning mt-3">Retour à la Liste des Restaurants</a>


                </div>
            </div>
        </div>
    </div>
    <!-- Restaurant Détails Fin -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/easing.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
