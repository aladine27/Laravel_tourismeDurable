<x-app-layout layout="simple" :assets="$assets ?? []">
    <span class="uisheet screen-darken"></span>
    <div class="header" style="background: url({{asset('images/dashboard/top-image.jpg')}}); background-size: cover; background-repeat: no-repeat; height: 100vh;position: relative;">
        <div class="container">
            <nav class="nav navbar navbar-expand-lg navbar-light top-1 rounded">
                <div class="container-fluid">
                    <a class="navbar-brand mx-2" href="#">
                        <svg width="30" class="text-primary" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"></rect>
                            <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"></rect>
                            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"></rect>
                            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"></rect>
                        </svg>
                        <h5 class="logo-title">Tourisme Durable</h5>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-2" aria-controls="navbar-2" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-2">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-start">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Restaurants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Voyageurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Événements</a>
                            </li>
                              <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white" href="{{ route('guidetour.client.index') }}">Tours</a>
                </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="tourisme-durable-content text-center text-white mt-5">
                <p class="lead">
                    Le tourisme durable est une forme de tourisme qui respecte, préserve et met en valeur les ressources naturelles, culturelles et sociales d'un territoire. Il vise à minimiser les impacts négatifs sur l'environnement et à maximiser les retombées économiques et sociales pour les communautés locales.
                </p>
                <img src="{{ asset('storage/photos/istockphoto-1372488167-612x612.jpg') }}" alt="Tourisme Durable" class="img-fluid mb-4 tourisme-durable-image">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="section-title text-center">Restaurants Recommandés</h2>
        <div class="row justify-content-center">
            @foreach($restaurants as $restaurant)
                <div class="col-md-3 mb-4">
                    <div class="restaurant-card">
                        <img src="{{ asset('storage/' . $restaurant->restaurant_image) }}" alt="Restaurant Image" class="img-fluid rounded">
                        <div class="restaurant-info">
                            <h5>{{ $restaurant->name }}</h5>
                            <p>{{ $restaurant->description }}</p>
                            <a href="#reservation" class="btn btn-reservation">Faire une Réservation</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- CSS for Styling -->
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
        }

        .home-content {
            padding: 50px;
            max-width: 100%;
        }

        .header {
            background: url({{asset('images/dashboard/top-image.jpg')}}) no-repeat center center;
            background-size: cover;
            height: 100vh;
            position: relative;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .tourisme-durable-content {
            margin-top: 50px;
        }

        .tourisme-durable-image {
            max-width: 100%;
            height: auto;
            width: 80%;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
            text-transform: uppercase;
        }

        .restaurant-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .restaurant-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .restaurant-info {
            padding: 15px;
            background-color: #ffffff;
            text-align: center;
        }

        .restaurant-info h5 {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
        }

        .restaurant-info p {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 15px;
        }

        .btn-reservation {
            background-color: #4CAF50; /* Green color for reservation */
            padding: 8px 16px;
            border-radius: 5px;
            color: white;
            font-size: 0.9rem;
            text-transform: uppercase;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .btn-reservation:hover {
            background-color: #45a049;
        }

        .fixed-size-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            text-transform: uppercase;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        aside.sidebar {
            display: none !important; /* Forcefully hides the sidebar */
        }
    </style>

    <!-- Bootstrap and jQuery Integration -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>