<x-app-layout :assets="$assets ?? []">
    <div class="transporteur-show-content">
        <h1>Détails du Transporteur</h1>

        <div class="mb-3">
            <label class="form-label"><strong>Nom :</strong></label>
            <p>{{ $transporteur->name }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Nom de l'Entreprise :</strong></label>
            <p>{{ $transporteur->company_name }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Téléphone :</strong></label>
            <p>{{ $transporteur->phone }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Email :</strong></label>
            <p>{{ $transporteur->email }}</p>
        </div>

        <div class="mb-3">
            <a href="{{ route('transporteurs.index') }}" class="btn btn-secondary">Retour à la Liste</a>
            <a href="{{ route('transporteurs.edit', $transporteur->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('transporteurs.destroy', $transporteur->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>

    <style>
        .transporteur-show-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .form-label {
            font-weight: bold;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }
    </style>
</x-app-layout>
