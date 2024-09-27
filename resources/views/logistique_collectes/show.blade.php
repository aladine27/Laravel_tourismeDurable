<x-app-layout :assets="$assets ?? []">
    <div class="logistique-content">
        <h1>Détails de la Collecte Logistique</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <strong>Chauffeur :</strong> {{ $logistiqueCollecte->chauffeur }}
        </div>
        <div class="mb-4">
            <strong>Véhicule :</strong> {{ $logistiqueCollecte->vehicle }}
        </div>
        <div class="mb-4">
            <strong>Date de Collecte :</strong> {{ \Carbon\Carbon::parse($logistiqueCollecte->collect_date)->format('d/m/Y') }}
        </div>
        <div class="mb-4">
            <strong>Transporteur :</strong> {{ $logistiqueCollecte->transporteur->name ?? 'N/A' }}
        </div>
        
        <!-- Departure and Arrival Information -->
        <div class="mb-4">
            <strong>Départ :</strong> {{ json_decode($logistiqueCollecte->departure)->name ?? 'N/A' }}
        </div>
        <div class="mb-4">
            <strong>Arrivée :</strong> {{ json_decode($logistiqueCollecte->arrival)->name ?? 'N/A' }}
        </div>

        <!-- Map Section -->
        <div id="map" style="height: 400px; width: 100%;"></div>

        <a href="{{ route('logistique_collectes.index') }}" class="btn btn-secondary mt-3">Retour à la Liste</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the map centered on Tunisia
            const map = L.map('map').setView([33.8869, 9.5375], 7);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            // Get departure and arrival data
            const departure = {!! json_encode(json_decode($logistiqueCollecte->departure)) !!};
            const arrival = {!! json_encode(json_decode($logistiqueCollecte->arrival)) !!};

            // Ensure valid data before proceeding
            if (departure && arrival) {
                const departureLatLng = [departure.lat, departure.lng];
                const arrivalLatLng = [arrival.lat, arrival.lng];

                // Add markers for departure and arrival
                L.marker(departureLatLng).addTo(map).bindPopup(departure.name).openPopup();
                L.marker(arrivalLatLng).addTo(map).bindPopup(arrival.name).openPopup();

                // Draw a blue line from departure to arrival
                const routePath = L.polyline([departureLatLng, arrivalLatLng], { color: 'blue' }).addTo(map);
                map.fitBounds(routePath.getBounds()); // Adjust the map view to fit the route
            } else {
                console.error('Invalid departure or arrival data. Departure:', departure, 'Arrival:', arrival);
            }
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

        h1 {
            font-size: 2rem; /* Adjusting the font size for the heading */
            margin-bottom: 1rem; /* Adding some space below the heading */
        }

        .mb-4 {
            margin-bottom: 1rem; /* Consistent margin for all sections */
        }

        strong {
            font-weight: bold; /* Ensuring the labels are bold for visibility */
        }
    </style>
</x-app-layout>
