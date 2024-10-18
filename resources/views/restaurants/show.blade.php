<x-app-layout :assets="$assets ?? []">
    <div class="restaurant-content">
        <div class="header-section">
            <h1>Informations sur le Restaurant</h1>
            <a href="{{ route('restaurants.index') }}" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left"></i> Retour à la liste des restaurants
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="restaurant-details">
                    <div class="detail-item">
                        <i class="fas fa-utensils"></i> <strong>Nom du Restaurant:</strong> {{ $restaurant->name }}
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-concierge-bell"></i> <strong>Type de Cuisine:</strong> {{ $restaurant->cuisine_type }}
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-map-marker-alt"></i> <strong>Adresse:</strong> {{ preg_replace('/\s*\(Lat:.*?Lng:.*?\)\s*/', '', $restaurant->address) }}
                    </div>

                    <div class="detail-item">
                        <i class="fas fa-image"></i> <strong>Image du Restaurant:</strong>
                    </div>
                    @if($restaurant->restaurant_image)
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $restaurant->restaurant_image) }}" alt="Restaurant Image" class="restaurant-image rounded">
                        </div>
                    @else
                        <div class="image-container">
                            <p>Aucune image disponible</p>
                        </div>
                    @endif

                    <div class="detail-item">
                        <i class="fas fa-book-open"></i> <strong>Menus:</strong>
                    </div>
                    @if($restaurant->menus->isNotEmpty())
                        <div class="image-container">
                            @foreach($restaurant->menus as $menu)
                                <div class="menu-item">
                                    <img src="{{ asset('storage/' . $menu->photo) }}" alt="Menu Image" class="restaurant-image rounded">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="image-container">
                            <p>Aucun menu disponible</p>
                            <a href="{{ route('menus.create', ['restaurant_id' => $restaurant->id]) }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Créer un menu
                            </a>
                        </div>
                    @endif
                </div>

                <div class="action-buttons mt-4">
                    <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Éditer
                    </a>
                    <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce restaurant ?');">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .restaurant-content {
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #fff;
        }

        .card-body {
            display: flex;
            flex-direction: column;
        }

        .restaurant-details {
            margin-bottom: 20px;
        }

        .detail-item {
            margin-bottom: 1rem;
            font-size: 1.1rem;
            color: #555;
            display: flex;
            align-items: center;
        }

        .detail-item i {
            margin-right: 10px;
            color: #007bff;
        }

        .detail-item strong {
            color: #333;
            margin-right: 5px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            margin-right: 5px;
        }

        .btn-secondary i {
            margin-right: 5px;
        }

        .image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 1rem 0;
        }

        .restaurant-image {
            max-width: 100%;
            height: auto;
            width: 500px; /* Increased width for larger images */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px 0; /* Spacing between menu images */
        }

        .action-buttons {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }

        .btn-warning, .btn-danger {
            display: flex;
            align-items: center;
        }

        .btn-warning i, .btn-danger i {
            margin-right: 5px;
        }
    </style>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</x-app-layout>
