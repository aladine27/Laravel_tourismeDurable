@extends('layouts.app')

@section('content')
    <form action="{{ route('guides.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="experience_years">Années d’expérience :</label>
            <input type="number" name="experience_years" id="experience_years" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="phone">Téléphone :</label>
            <input type="text" name="phone" id="phone" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
@endsection
