<x-app-layout :assets="$assets ?? []">
    <div class="edit-menu-content">
        <h1>Modifier le Menu</h1>

        <form action="{{ route('menus.update', $menu->id) }}" method="POST" id="menu-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="restaurant_id" class="form-label"><strong>Restaurant:</strong></label>
                <select name="restaurant_id" id="restaurant_id" class="form-select" required>
                    <option value="" disabled>Sélectionnez un restaurant</option>
                    @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" {{ $menu->restaurant_id == $restaurant->id ? 'selected' : '' }}>
                            {{ $restaurant->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="menu_image" class="form-label"><strong>Image du Menu:</strong></label>
                @if($menu->menu_image)
                    <div class="image-preview mt-3">
                        <img src="{{ asset('storage/' . $menu->menu_image) }}" alt="Menu Image" class="img-fluid img-thumbnail">
                    </div>
                @endif
                <input type="file" name="menu_image" id="menu_image" class="form-control">
            </div>

            <div class="mb-3 button-group">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
                <a href="{{ route('menus.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <style>
        .edit-menu-content {
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .edit-menu-content h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 1rem;
        }

        .btn-secondary, .btn-success {
            padding: 6px 12px;
            font-size: 0.875rem;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .image-preview {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .img-thumbnail {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</x-app-layout>