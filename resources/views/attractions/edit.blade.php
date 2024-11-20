<!-- resources/views/attractions/edit.blade.php -->
<form action="{{ route('attractions.update', $attraction) }}" method="POST">
    @csrf
    @method('PUT') <!-- Cela permet d'utiliser la méthode PUT pour la mise à jour -->

    <!-- Champ pour le nom de l'attraction -->
    <div>
        <label for="name">Nom de l'Attraction</label>
        <input type="text" name="name" id="name" value="{{ old('name', $attraction->name) }}" required>
    </div>

    <!-- Champ pour le type d'attraction -->
    <div>
        <label for="type">Type</label>
        <input type="text" name="type" id="type" value="{{ old('type', $attraction->type) }}" required>
    </div>

    <!-- Champ pour la description -->
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" required>{{ old('description', $attraction->description) }}</textarea>
    </div>

    <!-- Sélecteur pour choisir la destination associée -->
    <div>
        <label for="destination_id">Destination</label>
        <select name="destination_id" id="destination_id" required>
            @foreach ($destinations as $destination)
                <option value="{{ $destination->id }}" {{ $destination->id == old('destination_id', $attraction->destination_id) ? 'selected' : '' }}>
                    {{ $destination->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Mettre à jour l'Attraction</button>
</form>
