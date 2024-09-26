<x-app-layout :assets="$assets ?? []">
    <div class="transporteurs-content">
        <h1>Transporteurs</h1>
        <a href="{{ route('transporteurs.create') }}" class="btn btn-primary mb-3">Créer un Transporteur</a>

        <!-- Table to display the list of transporteurs -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nom de l'Entreprise</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transporteurs as $transporteur)
                    <tr>
                        <td>
                            <a href="{{ route('transporteurs.show', $transporteur) }}">{{ $transporteur->name }}</a>
                        </td>
                        <td>{{ $transporteur->company_name }}</td>
                        <td>{{ $transporteur->phone }}</td>
                        <td>{{ $transporteur->email }}</td>
                        <td>
                            <!-- Button to view the transporteur -->
                            <a href="{{ route('transporteurs.show', $transporteur) }}" class="btn btn-info btn-sm">Voir</a>

                            <!-- Button to edit the transporteur -->
                            <a href="{{ route('transporteurs.edit', $transporteur) }}" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Form to delete the transporteur -->
                            <form action="{{ route('transporteurs.destroy', $transporteur) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce transporteur ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .transporteurs-content {
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
