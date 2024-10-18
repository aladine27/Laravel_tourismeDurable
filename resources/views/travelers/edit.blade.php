@extends('layout')

<x-app-layout :assets="$assets ?? []">
<div class="trips-content">
    
    <h1>Modifier Voyageur</h1>

    <!-- Affichage des erreurs de validation -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire pour modifier le voyageur -->
    <form action="{{ route('gestionVoyageur.update', $traveler->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $traveler->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $traveler->email) }}" required>
        </div>

        <div class="form-group">
            <label for="preferences">Préférences :</label>
            <textarea name="preferences" id="preferences" class="form-control" rows="4">{{ old('preferences', $traveler->preferences) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="{{ route('gestionVoyageur.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
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