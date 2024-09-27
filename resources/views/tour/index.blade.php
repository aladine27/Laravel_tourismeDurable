@extends('layouts.app')

@section('content')
    <h1>Liste des Visites</h1>
    <a href="{{ route('tours.create') }}">Ajouter une Visite</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tours as $tour)
                <tr>
                    <td>{{ $tour->id }}</td>
                    <td>{{ $tour->title }}</td>
                    <td>{{ $tour->date }}</td>
                    <td>
                        <a href="{{ route('tours.show', $tour->id) }}">Voir</a>
                        <a href="{{ route('tours.edit', $tour->id) }}">Modifier</a>
                        <form action="{{ route('tours.destroy', $tour->id) }}" method="POST" style="display:inline;">
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
