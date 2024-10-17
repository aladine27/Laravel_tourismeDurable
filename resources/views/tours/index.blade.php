<x-app-layout :assets="$assets ?? []">
    <div class="tours-content">
        <h1>Liste des Visites</h1>
        <a href="{{ route('tours.create') }}" class="btn btn-primary mb-3">Ajouter une Visite</a>

        <!-- Tableau pour afficher la liste des visites -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>  <!-- Nouvelle colonne pour la description -->
                    <th>Date</th>
                    <th>Durée (heures)</th>  <!-- Nouvelle colonne pour la durée -->
                    <th>Prix</th>  <!-- Nouvelle colonne pour le prix -->
                    <th>nbPlace</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tours as $tour)
                    <tr>
                        <td>{{ $tour->id }}</td>
                        <td>
                            <a href="{{ route('tours.show', $tour) }}">{{ $tour->title }}</a>
                        </td>
                        <td>{{ $tour->description }}</td>  <!-- Affichage de la description -->
                        <td>{{ \Carbon\Carbon::parse($tour->date)->format('d-m-Y') }}</td>
                        <td>{{ $tour->duration }}</td>  <!-- Affichage de la durée -->
                        <td>{{ number_format($tour->price, 2, ',', ' ') }} €</td>  <!-- Affichage du prix avec format -->
                        <td>{{ $tour->nb_place }}</td>
                        <td>
                            <!-- Bouton pour modifier la visite -->
                            <a href="{{ route('tours.edit', $tour) }}" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Formulaire pour supprimer la visite -->
                            <form action="{{ route('tours.destroy', $tour) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .tours-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
