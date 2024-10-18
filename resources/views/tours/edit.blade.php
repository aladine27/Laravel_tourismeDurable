<x-app-layout :assets="$assets ?? []">
    <div class="tour-form">
        <h1>Edit Tour</h1>

        <form action="{{ route('tours.update', $tour->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titre de la Visite</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $tour->title) }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $tour->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date de la Visite</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $tour->date) }}" required>
                @error('date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Durée (heures)</label>
                <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration', $tour->duration) }}" required>
                @error('duration')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $tour->price) }}" required>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
    <label for="nb_place" class="form-label">Nombre de Places</label>
    <input type="number" name="nb_place" id="nb_place" class="form-control" required>
</div>
    

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Modifier la Visite</button>
                <a href="{{ route('tours.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <style>
        .tour-form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
