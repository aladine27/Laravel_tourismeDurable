@extends('template.template-front')


@section('content')
    <div class="container-fluid position-relative p-0 bg-white text-primary">

        <div class="text-primary bg-white  hero-header">
            <div class="py-1 bg-white">
                <div class="row justify-content-center py-1 bg-white">
                    <div class="pt-lg-5 mt-lg-5 text-center bg-white">
                        <h1 class="display-3 text-primary mb-3 animated slideInDown">Détails du Restaurant</h1>
                        <p class="fs-4 text-primary mb-4 animated slideInDown">Découvrez plus d'informations sur le restaurant {{ $restaurant->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
@endsection



