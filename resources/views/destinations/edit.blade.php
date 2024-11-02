<x-app-layout :assets="$assets ?? []">
    <div class="destination-form">
        <h1>Edit Destination</h1>

        <form action="{{ route('destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Destination Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $destination->name) }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $destination->description) }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Destination Location</label>
                <input type="hidden" name="location" id="location" value="{{ old('location', json_encode($destination->location)) }}" required>
                <div id="map" style="height: 300px; width: 100%;"></div>
                @error('location')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Current Image</label>
                <div>
                    <img src="{{ asset('storage/' . $destination->image) }}" alt="Destination Image" style="max-width: 100px; max-height: 100px;">
                </div>
                <label for="image">New Image (Choose File)</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Destination</button>
            <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <style>
        .destination-form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Parse the existing location from hidden input
            const locationData = JSON.parse(document.getElementById('location').value || '{"lat": 36.8065, "lng": 10.1815}'); // Default to some values if empty
            const map = L.map('map').setView([locationData.lat, locationData.lng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            const marker = L.marker([locationData.lat, locationData.lng]).addTo(map);

            map.on('click', function(e) {
                const lat = e.latlng.lat;
                const lng = e.latlng.lng;
                marker.setLatLng([lat, lng]);
                document.getElementById('location').value = JSON.stringify({ lat: lat, lng: lng });
            });
        });
    </script>
</x-app-layout>
