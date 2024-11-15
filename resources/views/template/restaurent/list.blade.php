@extends('template.template-front')


@section('content')
    <!-- Navbar & En-tête Début -->
    <div class="container-fluid position-relative p-0 bg-white text-primary">

        <div class="text-primary bg-white  hero-header">
            <div class="py-1 bg-white">
                <div class="row justify-content-center py-1 bg-white">
                    <div class="pt-lg-5 mt-lg-5 text-center bg-white">
                        <h1 class="display-3 text-primary mb-3 animated slideInDown">Découvrez Nos Restaurants</h1>
                        <p class="fs-4 text-primary mb-4 animated slideInDown">Trouvez les meilleurs endroits pour manger et savourer vos repas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & En-tête Fin -->

    <!-- Restaurants Début -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Partenaires</h6>
                <h1 class="mb-5">Choix de Restaurants</h1>
                <!-- Ajouter le bouton "Mes Réservations" -->
                <div class="text-center mb-4">
                    <a href="{{ route('reservations.list') }}" class="btn btn-secondary">Mes Réservations</a>
                </div>
            </div>
            <div class="row g-3">
                @foreach($restaurants as $restaurant)
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative d-block overflow-hidden" style="height: 300px;">
                            @if($restaurant->restaurant_image)
                                <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $restaurant->restaurant_image) }}" alt="{{ $restaurant->name }}" style="object-fit: cover;">
                            @else
                                <img class="img-fluid w-100 h-100" src="{{ asset('images/img/default-restaurant.jpg') }}" alt="{{ $restaurant->name }}" style="object-fit: cover;">
                            @endif
                            <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">{{ $restaurant->name }}</div>
                        </div>
                        <div class="text-center mt-3">
                            <!-- Button to show restaurant details -->
                            <a href="{{ route('restaurants.details', $restaurant->id) }}" class="btn btn-warning">Voir les Informations</a>
                            <a href="{{ route('restaurants.showReservationForm', $restaurant->id) }}" class="btn btn-primary">Faire une Réservation</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Restaurants Fin -->
@endsection



