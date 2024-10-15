<x-app-layout :assets="$assets ?? []">
    <div class="guides-content container-fluid">
        <h1 class="text-center mb-4">Liste des Guides</h1>
        <a href="{{ route('guides.create') }}" class="btn btn-primary mb-3">Créer un Guide</a>

        <!-- Tableau pour afficher la liste des guides -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Années d'Expérience</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guides as $guide)
                        <tr>
                            <td>{{ $guide->id }}</td>
                            <td><a href="{{ route('guides.show', $guide->id) }}">{{ $guide->name }}</a></td>
                            <td>{{ $guide->experience_years }}</td>
                            <td>{{ $guide->email }}</td>
                            <td>{{ $guide->phone }}</td>
                            <td>
                                @if ($guide->image)
                                    <img src="{{ asset('storage/' . $guide->image) }}" alt="Image du Guide" class="img-fluid" style="max-width: 100px;">
                                @else
                                    Pas d'image
                                @endif
                            </td>
                            <td>
                                <!-- Bouton pour modifier le guide -->
                                <a href="{{ route('guides.edit', $guide->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                                <!-- Formulaire pour supprimer le guide -->
                                <form action="{{ route('guides.destroy', $guide->id) }}" method="POST" style="display:inline-block;">
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
    </div>

    <style>
        .guides-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
