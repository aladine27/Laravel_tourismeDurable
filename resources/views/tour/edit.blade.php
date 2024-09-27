@extends('layouts.app')

@section('content')
    <form action="{{ route('tours.update', $tour->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="{{ $tour->title }}" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" required>{{ $tour->description }}</textarea>
        </div>
        <div>
            <label for="date">Date :</label>
            <input type="date" name="date" id="date" value="{{ $tour->date }}" required>
        </div>
        <div>
            <label for="duration">Durée (heures) :</label>
            <input type="number" name="duration" id="duration" value="{{ $tour->duration }}" required>
        </div>
        <div>
            <label for="price">Prix :</label>
            <input type="number" name="price" id="price" value="{{ $tour->price }}" required>
        </div>
        <button type="submit">Modifier</button>
    </form>
@endsection
