<x-app-layout :assets="$assets ?? []">
    <div class="event-content">
        <h1>Create Event</h1>

        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <div id="map" style="height: 300px; width: 100%;"></div>
                <input type="hidden" name="location" id="location" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create Event</button>
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
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
                document.getElementById('location').value = JSON.stringify({ lat: lat, lng: lng });
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
