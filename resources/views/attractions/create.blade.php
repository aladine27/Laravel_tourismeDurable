<x-app-layout :assets="$assets ?? []">
    <div class="Attraction-content mt-4">
        <h1>Create Attraction</h1>

        <form action="{{ route('attractions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Attraction Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="" disabled selected>Choisir un type d'attraction</option>
                    <option value="Culturelle">Culturelle</option>
                    <option value="Naturelle">Naturelle</option>
                    <option value="Historique">Historique</option>
                    <option value="Aventure">Aventure</option>
                    <option value="Religieuse">Religieuse</option>
                    <option value="Éducative">Éducative</option>
                    <option value="Ludique">Ludique</option>
                    <option value="Gastronomique">Gastronomique</option>
                    <option value="Sportive">Sportive</option>
                </select>
            </div>



            <div>
                <label for="destination_id">Destination</label>
                <select name="destination_id" id="destination_id" required>
                    @foreach ($destinations as $destination)
                    <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create Attraction</button>
                <a href="{{ route('attractions.index') }}" class="btn btn-secondary">Cancel</a>
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