<x-app-layout :assets="$assets ?? []">
    <div class="restaurant-content">
        <div class="header-section">
            <h1>Liste des Menus</h1>
            <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Créer un Menu
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach($menus as $menu)
                <div class="col-md-4 mb-4"> <!-- Adjust the column size as needed -->
                    <div class="card h-100 shadow-sm"> <!-- Add h-100 class to make all cards the same height -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $menu->restaurant->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $menu->created_at->format('d/m/Y') }}</h6>
                            <div class="menu-image mb-3">
                                @if($menu->photo)
                                    <img src="{{ asset('storage/' . $menu->photo) }}" alt="Menu Image" class="img-fluid fixed-size-image rounded">
                                @else
                                    <p>Aucune image disponible</p>
                                @endif
                            </div>
                            <div class="mt-auto d-flex flex-wrap justify-content-start"> <!-- Push buttons to the bottom and align them -->
                                <a href="{{ route('menus.show', $menu->id) }}" class="btn btn-info btn-sm mb-2 me-2">
                                    <i class="fas fa-eye"></i> Voir
                                </a>
                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm mb-2 me-2">
                                    <i class="fas fa-edit"></i> Éditer
                                </a>
                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-2 me-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce menu ?');">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .restaurant-content {
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
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
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .btn {
            margin-right: 5px; /* Add some space between buttons */
        }

        .btn i {
            margin-right: 5px;
        }

        .fixed-size-image {
            width: 100%; /* Set the width to 100% of the container */
            height: 200px; /* Set a fixed height */
            object-fit: cover; /* Ensure the image covers the entire area */
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</x-app-layout>