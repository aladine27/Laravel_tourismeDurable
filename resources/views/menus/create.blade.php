<x-app-layout :assets="$assets ?? []">
    <div class="restaurant-content">
        <h1>Créer un Menu</h1>

        <form action="{{ route('menus.store') }}" method="POST" id="menu-form" enctype="multipart/form-data">
            @csrf

            @if(request()->has('restaurant_id'))
                <input type="hidden" name="restaurant_id" value="{{ request()->get('restaurant_id') }}">
            @else
                <div class="mb-3">
                    <label for="restaurant_id" class="form-label">Restaurant</label>
                    <select name="restaurant_id" id="restaurant_id" class="form-select" required>
                        <option value="" disabled selected>Sélectionnez un restaurant</option>
                        @foreach($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="mb-3">
                <label for="menu_image" class="form-label">Image du Menu</label>
                <input type="file" name="menu_image" id="menu_image" class="form-control" required onchange="previewImage(event)">
            </div>

            <!-- Aperçu de l'image -->
            <div class="mb-3 image-preview-container">
                <img id="image_preview" src="#" alt="Aperçu de l'image" style="display:none;">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Créer le Menu</button>
                <a href="{{ route('menus.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <style>
        .restaurant-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .btn-secondary {
            margin-bottom: 10px;
        }

        /* Style pour centrer l'image */
        .image-preview-container {
            text-align: center; /* Centrer horizontalement */
            margin-top: 20px;
        }

        #image_preview {
            max-width: 100%; /* Adapter à la taille du conteneur */
            max-height: 400px; /* Limiter la hauteur à 400px */
            border: 1px solid #ddd; /* Bordure pour l'aperçu */
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ajout d'une légère ombre */
        }
    </style>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            var imagePreview = document.getElementById('image_preview');
            
            reader.onload = function() {
                if (reader.readyState == 2) {
                    imagePreview.src = reader.result;
                    imagePreview.style.display = 'block'; // Afficher l'image
                }
            }
            
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
