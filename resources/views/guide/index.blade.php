@extends('layouts.app')

@section('content')
    <h1>Liste des Guides</h1>
    <a href="{{ route('guides.create') }}">Ajouter un Guide</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Années d'Expérience</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guides as $guide)
                <tr>
                    <td>{{ $guide->id }}</td>
                    <td>{{ $guide->name }}</td>
                    <td>{{ $guide->experience_years }}</td>
                    <td>{{ $guide->email }}</td>
                    <td>{{ $guide->phone }}</td>
                    <td>
                        <a href="{{ route('guides.show', $guide->id) }}">Voir</a>
                        <a href="{{ route('guides.edit', $guide->id) }}">Éditer</a>
                        <form action="{{ route('guides.destroy', $guide->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

