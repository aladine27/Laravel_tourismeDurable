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
                <input type="file" name="menu_image" id="menu_image" class="form-control" required>
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
    </style>
</x-app-layout>