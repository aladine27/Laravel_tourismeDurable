<x-app-layout :assets="$assets ?? []">
    <div class="event-form">
        <h1>Edit Event</h1>

        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $event->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <div id="map" style="height: 300px; width: 100%;"></div>
                <input type="hidden" name="location" id="location" required>
            </div>
<div class="mb-3">
    <label for="date" class="form-label">Event Date</label>
    <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $event->date) }}" required>
    @error('date')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

            <button type="submit" class="btn btn-primary">Update Event</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
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
        .event-form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
