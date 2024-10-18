<x-app-layout :assets="$assets ?? []">
    <div class="menu-content">
        <div class="header-section">
            <h1>Détails du Menu</h1>
            <a href="{{ route('menus.index') }}" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left"></i> Retour à la liste des menus
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="menu-details">
                    <div class="detail-item">
                        <i class="fas fa-utensils"></i> <strong>Restaurant:</strong> {{ $menu->restaurant->name }}
                    </div>

                    <div class="detail-item">
                        <i class="fas fa-map-marker-alt"></i> <strong>Adresse:</strong> {{ preg_replace('/\s*\(Lat:.*\)$/', '', $menu->restaurant->address) }}
                    </div>

                    <div class="detail-item">
                        <i class="fas fa-concierge-bell"></i> <strong>Type de Cuisine:</strong> {{ $menu->restaurant->cuisine_type }}
                    </div>

                    <div class="detail-item">
                        <i class="fas fa-calendar-alt"></i> <strong>Date de Création:</strong> {{ $menu->created_at->format('d/m/Y') }}
                    </div>

                    <div class="detail-item">
                        <i class="fas fa-image"></i> <strong>Image du Restaurant:</strong>
                    </div>
                    @if($menu->restaurant->restaurant_image)
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $menu->restaurant->restaurant_image) }}" alt="Restaurant Image" class="menu-image rounded">
                        </div>
                    @else
                        <div class="image-container">
                            <p>Aucune image disponible</p>
                        </div>
                    @endif

                    <div class="detail-item">
                        <i class="fas fa-image"></i> <strong>Image du Menu:</strong>
                    </div>
                    @if($menu->photo)
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $menu->photo) }}" alt="Menu Image" class="menu-image rounded">
                        </div>
                    @else
                        <div class="image-container">
                            <p>Aucune image disponible</p>
                        </div>
                    @endif
                </div>

                <div class="action-buttons mt-4">
                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Éditer
                    </a>
                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce menu ?');">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .menu-content {
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

        .menu-details {
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
            justify-content: center;
            margin: 1rem 0;
        }

        .menu-image {
            max-width: 100%;
            height: auto;
            width: 500px; /* Increased width for larger images */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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