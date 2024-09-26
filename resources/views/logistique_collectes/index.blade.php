<x-app-layout :assets="$assets ?? []">
    <div class="logistique-content">
        <h1>Logistique Collectes</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('logistique_collectes.create') }}" class="btn btn-primary mb-3">Créer une Collecte Logistique</a>

        <!-- Table to display the list of logistique collectes -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Chauffeur</th>
                    <th>Véhicule</th>
                    <th>Route</th>
                    <th>Date de Collecte</th>
                    <th>Transporteur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logistiqueCollectes as $logistiqueCollecte)
                    <tr>
                        <td>
                            <a href="{{ route('logistique_collectes.show', $logistiqueCollecte->id) }}">{{ $logistiqueCollecte->chauffeur }}</a>
                        </td>
                        <td>{{ $logistiqueCollecte->vehicle }}</td>
                        <td>{{ $logistiqueCollecte->route }}</td>
                        <td>{{ $logistiqueCollecte->collect_date }}</td>
                        <td>{{ $logistiqueCollecte->transporteur->name }}</td>
                        <td>
                            <a href="{{ route('logistique_collectes.show', $logistiqueCollecte->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('logistique_collectes.edit', $logistiqueCollecte->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('logistique_collectes.destroy', $logistiqueCollecte->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette collecte ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .logistique-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            text-align: center; /* Centering the table content */
        }

        .table th, .table td {
            vertical-align: middle; /* Vertical align middle for better appearance */
        }
    </style>
</x-app-layout>
