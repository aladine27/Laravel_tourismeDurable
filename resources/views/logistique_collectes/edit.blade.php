<x-app-layout :assets="$assets ?? []">
    <div class="logistique-content">
        <h1>Modifier une Collecte Logistique</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('logistique_collectes.update', $logistiqueCollecte->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="chauffeur" class="form-label">Chauffeur</label>
                <input type="text" name="chauffeur" id="chauffeur" class="form-control" value="{{ $logistiqueCollecte->chauffeur }}" required>
            </div>

            <div class="mb-3">
                <label for="vehicle" class="form-label">Véhicule</label>
                <input type="text" name="vehicle" id="vehicle" class="form-control" value="{{ $logistiqueCollecte->vehicle }}" required>
            </div>

            <div class="mb-3">
                <label for="collect_date" class="form-label">Date de Collecte</label>
                <input type="date" name="collect_date" id="collect_date" class="form-control" value="{{ $logistiqueCollecte->collect_date }}" required>
            </div>

            <div class="mb-3">
                <label for="departure" class="form-label">Départ</label>
                <select id="departure" name="departure" class="form-select" required>
                    <option value="">Sélectionnez un lieu de départ</option>
                    @foreach ($locations as $location)
                        @if (is_array($location) && isset($location['name'], $location['lat'], $location['lng']))
                            <option value="{{ json_encode(['name' => $location['name'], 'lat' => $location['lat'], 'lng' => $location['lng']]) }}"
                                {{ $logistiqueCollecte->departure == json_encode(['name' => $location['name'], 'lat' => $location['lat'], 'lng' => $location['lng']]) ? 'selected' : '' }}>
                                {{ $location['name'] }}
                            </option>
                        @else
                            <option value="">{{ __('Invalid location data') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="arrival" class="form-label">Arrivée</label>
                <select id="arrival" name="arrival" class="form-select" required>
                    <option value="">Sélectionnez un lieu d'arrivée</option>
                    @foreach ($locations as $location)
                        @if (is_array($location) && isset($location['name'], $location['lat'], $location['lng']))
                            <option value="{{ json_encode(['name' => $location['name'], 'lat' => $location['lat'], 'lng' => $location['lng']]) }}"
                                {{ $logistiqueCollecte->arrival == json_encode(['name' => $location['name'], 'lat' => $location['lat'], 'lng' => $location['lng']]) ? 'selected' : '' }}>
                                {{ $location['name'] }}
                            </option>
                        @else
                            <option value="">{{ __('Invalid location data') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="transporteur_id" class="form-label">Transporteur</label>
                <select name="transporteur_id" id="transporteur_id" class="form-select" required>
                    @foreach ($transporteurs as $transporteur)
                        <option value="{{ $transporteur->id }}" {{ $logistiqueCollecte->transporteur_id == $transporteur->id ? 'selected' : '' }}>
                            {{ $transporteur->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
            <a href="{{ route('logistique_collectes.index') }}" class="btn btn-secondary mt-3">Retour à la liste des Collectes</a>
        </form>

        <div id="map" style="height: 300px; width: 100%;"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([33.8869, 9.5375], 7); // Default to Tunisia
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            let points = [];
            const polyline = L.polyline([], { color: 'blue' }).addTo(map);

            // Function to add point to the map
            function updatePolyline() {
                polyline.setLatLngs(points);
            }

            // Update map with selected departure location
            document.getElementById('departure').addEventListener('change', function() {
                const location = JSON.parse(this.value);
                const departureLatLng = [location.lat, location.lng];
                map.setView(departureLatLng, 10);
                L.marker(departureLatLng).addTo(map).bindPopup(location.name).openPopup();
                points[0] = departureLatLng; // Update departure point
                updatePolyline(); // Update polyline
            });

            // Update map with selected arrival location
            document.getElementById('arrival').addEventListener('change', function() {
                const location = JSON.parse(this.value);
                const arrivalLatLng = [location.lat, location.lng];
                map.setView(arrivalLatLng, 10);
                L.marker(arrivalLatLng).addTo(map).bindPopup(location.name).openPopup();
                points[1] = arrivalLatLng; // Update arrival point
                updatePolyline(); // Update polyline
            });
        });
    </script>

    <style>
        .logistique-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .form-label {
            font-weight: bold; /* Making label text bold for better visibility */
        }
        
        .btn {
            margin-top: 10px; /* Adding some space between buttons */
        }
    </style>
</x-app-layout>
