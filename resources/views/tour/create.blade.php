@extends('layouts.app')

@section('content')
    <form action="{{ route('tours.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <label for="date">Date :</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div>
            <label for="duration">Durée (heures) :</label>
            <input type="number" name="duration" id="duration" required>
        </div>
        <div>
            <label for="price">Prix :</label>
            <input type="number" name="price" id="price" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
@endsection
