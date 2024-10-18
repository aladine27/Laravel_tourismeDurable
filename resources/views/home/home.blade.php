<x-app-layout :assets="$assets ?? []" :showSidebar="false">
    <div class="home-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content text-center">
                <h1 class="display-4">Découvrez les Meilleurs Restaurants et Destinations du Monde</h1>
                <p class="lead">Plongez dans un voyage culinaire et culturel à travers nos sélections.</p>
                <a href="#restaurants" class="btn btn-hero">Explorez les Restaurants</a>
            </div>
        </section>

        <!-- Big Section as Slides -->
        <div id="restaurants" class="restaurant-slider-section mb-5">
            <div class="header-section">
                <h2 class="section-title">Meilleur Sélection des Restaurants</h2>
            </div>

            <div class="restaurant-slider">
                @foreach($restaurants as $restaurant)
                    <div class="restaurant-item">
                        <div class="restaurant-img-overlay">
                            <img src="{{ asset('storage/' . $restaurant->restaurant_image) }}" alt="Restaurant Image" class="img-fluid fixed-size-image rounded">
                            <div class="overlay">
                                <h3>{{ $restaurant->name }}</h3>
                                <p>{{ $restaurant->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Button to View All Restaurants -->
        <div class="text-center mt-4">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#allRestaurants" aria-expanded="false" aria-controls="allRestaurants">
                Voir Tous les Restaurants
            </button>
        </div>

        <!-- Collapsible Section for All Restaurants -->
        <div class="collapse mt-4" id="allRestaurants">
            <div class="row">
                @foreach($restaurants as $restaurant)
                    <div class="col-md-4 mb-4">
                        <div class="restaurant-card">
                            <img src="{{ asset('storage/' . $restaurant->restaurant_image) }}" alt="Restaurant Image" class="img-fluid rounded">
                            <div class="restaurant-info">
                                <h5>{{ $restaurant->name }}</h5>
                                <p>{{ $restaurant->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
        }

        .hero-section {
            background-image: url('https://example.com/beautiful-image.jpg'); /* Replace with a beautiful background */
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .btn-hero {
            background-color: #4a4e69; /* Neutral color */
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            font-size: 1.2rem;
            text-transform: uppercase;
            transition: background-color 0.3s;
        }

        .btn-hero:hover {
            background-color: #9a8c98; /* Lighter neutral */
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
            text-transform: uppercase;
        }

        .restaurant-slider {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .restaurant-item {
            position: relative;
        }

        .restaurant-img-overlay {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .restaurant-img-overlay .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .restaurant-img-overlay:hover .overlay {
            opacity: 1;
        }

        .restaurant-img-overlay h3 {
            color: #fff;
            font-size: 2rem;
        }

        .restaurant-img-overlay p {
            color: #ddd;
            font-size: 1.2rem;
        }

        .restaurant-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .restaurant-card:hover {
            transform: scale(1.05);
        }

        .restaurant-info {
            padding: 15px;
            background-color: #ffffff;
            text-align: center;
        }

        .restaurant-info h5 {
            font-size: 1.5rem;
            color: #333;
        }

        .restaurant-info p {
            font-size: 1rem;
            color: #555;
        }

        .fixed-size-image {
            width: 100%;
            height: 350px;
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
    </style>

    <!-- Slick Slider Integration -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.restaurant-slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
</x-app-layout>