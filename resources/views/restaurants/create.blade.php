<x-app-layout :assets="$assets ?? []">
    <div class="restaurant-content">
        <h1>Créer un Restaurant</h1>

        <form action="{{ route('restaurants.store') }}" method="POST" id="restaurant-form" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom du Restaurant</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cuisine_type" class="form-label">Type de Cuisine</label>
                <select name="cuisine_type" id="cuisine_type" class="form-select" required>
                    <option value="" disabled selected>Sélectionnez un type de cuisine</option>
                    <option value="Italienne">Italienne</option>
                    <option value="Chinoise">Chinoise</option>
                    <option value="Indienne">Indienne</option>
                    <option value="Française">Française</option>
                    <option value="Méditerranéenne">Méditerranéenne</option>
                    <option value="Végétarienne">Végétarienne</option>
                    <option value="Américaine">Américaine</option>
                    <option value="Mexicaine">Mexicaine</option>
                    <!-- Add more cuisine types as needed -->
                </select>
            </div>

            <div class="mb-3">
                <label for="restaurant_image" class="form-label">Image du Restaurant</label>
                <input type="file" name="restaurant_image" id="restaurant_image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="map" class="form-label">Sélectionner un Emplacement</label>
                <div id="map" style="height: 300px; width: 100%;"></div>
                <button type="button" id="locateMe" class="btn btn-secondary mt-2">Me Localiser</button>
            </div>

            <!-- Hidden fields to store latitude, longitude, and full address -->
            <input type="hidden" name="latitude" id="latitude" required>
            <input type="hidden" name="longitude" id="longitude" required>
            <input type="hidden" name="address" id="address" required>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Créer le Restaurant</button>
                <a href="{{ route('restaurants.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([35.6895, 139.6917], 13); // Default to Tokyo

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            const marker = L.marker([35.6895, 139.6917]).addTo(map); // Default marker

            // Function to update marker, latitude, longitude, and address
            function updateLocation(lat, lng) {
                marker.setLatLng([lat, lng]);
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;

                // Reverse geocoding to get the address
                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.display_name) {
                            const fullAddress = `${data.display_name} (Lat: ${lat}, Lng: ${lng})`;
                            document.getElementById('address').value = fullAddress;
                        }
                    })
                    .catch(error => console.error('Error retrieving address:', error));
            }

            // Get user's current location
            document.getElementById('locateMe').addEventListener('click', function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        map.setView([lat, lng], 13);
                        updateLocation(lat, lng);
                    }, function() {
                        alert('Unable to retrieve your location.');
                    });
                } else {
                    alert('Geolocation is not supported by this browser.');
                }
            });

            // Click event on the map to set the marker, lat, lng, and get the address
            map.on('click', function(e) {
                const lat = e.latlng.lat;
                const lng = e.latlng.lng;
                updateLocation(lat, lng);
            });

            // Before form submission, make sure the address field is filled with complete data
            document.getElementById('restaurant-form').addEventListener('submit', function(e) {
                const addressField = document.getElementById('address').value;
                if (!addressField) {
                    e.preventDefault();
                    alert('Please select a location on the map.');
                }
            });
        });
    </script>

    <style>
        .restaurant-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>