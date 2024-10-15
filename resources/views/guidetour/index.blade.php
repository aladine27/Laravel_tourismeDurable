<x-app-layout :assets="$assets ?? []">
    <div class="tours-content">
        <h1>Liste des Affectations de Guides</h1>
        <a href="{{ route('guidetours.create') }}" class="btn btn-primary mb-3">Ajouter une Affectation</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tour</th>
                    <th>Guides</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->id }}</td>
                        <td>{{ $assignment->title }}</td>
                        <td>
                            @foreach ($assignment->guides as $guide)
                                <span class="badge bg-secondary">{{ $guide->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('guidetours.edit', $assignment->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('guidetours.destroy', $assignment->id) }}" method="POST" style="display: inline;">
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
