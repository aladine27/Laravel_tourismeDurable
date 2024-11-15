@extends('layout')

<x-app-layout :assets="$assets ?? []">
<div class="trips-content">

    <h1>Liste des voyages</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('gestionVoyage.create') }}" class="btn btn-primary">Ajouter un voyage</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Destination</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Coût</th>
                <th>Voyageurs</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trips as $trip)
                <tr>
                    <td>{{ $trip->destination }}</td>
                    <td>{{ $trip->start_date }}</td>
                    <td>{{ $trip->end_date }}</td>
                    <td>{{ $trip->cost }} DT</td>
                    <td>
                            @if ($trip->travelers->isEmpty())
                                Aucuns voyageurs
                            @else
                                @foreach ($trip->travelers as $traveler)
                                    {{ $traveler->name }}@if(!$loop->last), @endif
                                @endforeach
                            @endif
                     </td>
                    <td>
                        <a href="{{ route('gestionVoyage.edit', $trip->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('gestionVoyage.destroy', $trip->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce voyage ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
        .trips-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>