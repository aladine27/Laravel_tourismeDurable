@extends('layout')

<x-app-layout :assets="$assets ?? []">
<div class="trips-content">
    
    <h1>Liste des voyageurs</h1>
    
    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('gestionVoyageur.create') }}" class="btn btn-primary">Ajouter un voyageur</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($travelers as $traveler)
                <tr>
                    <td>{{ $traveler->name }}</td>
                    <td>{{ $traveler->email }}</td>
                    <td>
                        <a href="{{ route('gestionVoyageur.edit', $traveler->id) }}" class="btn btn-warning">Modifier</a>
                        <!-- Bouton de suppression avec confirmation -->
                        <form action="{{ route('gestionVoyageur.destroy', $traveler->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce voyageur ?');">
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