<x-app-layout :assets="$assets ?? []">
    <div class="accommodation-form">
        <h1>Modifier Hébergement</h1>

        <form action="{{ route('accommodations.update', $accommodation) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom d'hebérgement</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $accommodation->name) }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Adresse</label>
                <div id="map" style="height: 300px; width: 100%;"></div>
                <input type="hidden" name="address" id="address" required>
            </div>

            <div class="mb-3">
                <label for="price_per_night" class="form-label">Prix par nuit</label>
                <input type="number" name="price_per_night" id="price_per_night" class="form-control" value="{{ old('price_per_night', $accommodation->price_per_night) }}" required>
                @error('price_per_night')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Modifier Hébergement</button>
            <a href="{{ route('accommodations.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <style>
        .accommodation-form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([36.8065, 10.1815], 13); // Default to Tunis, Tunisia

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            const marker = L.marker([36.8065, 10.1815]).addTo(map); // Default marker in Tunis

            map.on('click', function(e) {
                const lat = e.latlng.lat;
                const lng = e.latlng.lng;
                marker.setLatLng([lat, lng]);
                document.getElementById('address').value = JSON.stringify({ lat: lat, lng: lng });
            });
        });
    </script>
</x-app-layout>
