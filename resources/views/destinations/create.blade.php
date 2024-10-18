<x-app-layout :assets="$assets ?? []">
    <div class="destination-content mt-4">
        <h1>Create Destination</h1>

        <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Destination Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>


            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <div id="map" style="height: 300px; width: 100%;"></div>
                <input type="hidden" name="location" id="location" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create Destination</button>
                <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([36.8065, 10.1815], 13); // Default to Tokyo

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            const marker = L.marker([10.1815, 10.1815]).addTo(map); // Default marker

            map.on('click', function(e) {
                const lat = e.latlng.lat;
                const lng = e.latlng.lng;
                marker.setLatLng([lat, lng]);
                document.getElementById('location').value = JSON.stringify({
                    lat: lat,
                    lng: lng
                });
            });
        });
    </script>

    <style>
        .event-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>