<x-app-layout :assets="$assets ?? []">
    <div class="logistique-content">
        <h1>Détails de la Collecte Logistique</h1>

        <div class="mb-4">
            <strong>Chauffeur :</strong> {{ $logistiqueCollecte->chauffeur }}
        </div>
        <div class="mb-4">
            <strong>Véhicule :</strong> {{ $logistiqueCollecte->vehicle }}
        </div>
        <div class="mb-4">
            <strong>Route :</strong> {{ $logistiqueCollecte->route }}
        </div>
        <div class="mb-4">
            <strong>Date de Collecte :</strong> {{ $logistiqueCollecte->collect_date }}
        </div>
        <div class="mb-4">
            <strong>Transporteur :</strong> {{ $logistiqueCollecte->transporteur->name }}
        </div>

        <a href="{{ route('logistique_collectes.index') }}" class="btn btn-secondary">Retour à la Liste</a>
    </div>

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

        .btn {
            margin-top: 10px; /* Adding space above the button */
        }
    </style>
</x-app-layout>
