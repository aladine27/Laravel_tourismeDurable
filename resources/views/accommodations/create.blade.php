<x-app-layout :assets="$assets ?? []">
    <div class="accommodation-content">
        <h1>Créer Hébergement</h1>

        <form action="{{ route('accommodations.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom d'hébergement</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price_per_night" class="form-label">Prix par nuit</label>
                <input type="number" name="price_per_night" id="price_per_night" class="form-control" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Créer Hébergement</button>
                <a href="{{ route('accommodations.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([35.6895, 139.6917], 13); // Default to Tokyo

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            const marker = L.marker([35.6895, 139.6917]).addTo(map); // Default marker

            map.on('click', function(e) {
                const lat = e.latlng.lat;
                const lng = e.latlng.lng;
                marker.setLatLng([lat, lng]);
                document.getElementById('address').value = JSON.stringify({ lat: lat, lng: lng });
            });
        });
    </script>

    <style>
        .accommodation-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
