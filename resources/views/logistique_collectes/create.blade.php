<x-app-layout :assets="$assets ?? []">
    <div class="logistique-content">
        <h1>Créer une Collecte Logistique</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('logistique_collectes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="chauffeur" class="form-label">Chauffeur</label>
                <input type="text" name="chauffeur" id="chauffeur" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="vehicle" class="form-label">Véhicule</label>
                <input type="text" name="vehicle" id="vehicle" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="route" class="form-label">Route</label>
                <input type="text" name="route" id="route" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="collect_date" class="form-label">Date de Collecte</label>
                <input type="date" name="collect_date" id="collect_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="transporteur_id" class="form-label">Transporteur</label>
                <select name="transporteur_id" id="transporteur_id" class="form-select" required>
                    @foreach ($transporteurs as $transporteur)
                        <option value="{{ $transporteur->id }}">{{ $transporteur->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
        </form>

        <a href="{{ route('logistique_collectes.index') }}" class="btn btn-secondary mt-3">Retour à la liste des Collectes</a>
    </div>

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
