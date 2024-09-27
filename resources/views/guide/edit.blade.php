@extends('layouts.app')

@section('content')
    <form action="{{ route('guides.update', $guide->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="{{ $guide->name }}" required>
        </div>
        <div>
            <label for="experience_years">Années d’expérience :</label>
            <input type="number" name="experience_years" id="experience_years" value="{{ $guide->experience_years }}" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="{{ $guide->email }}" required>
        </div>
        <div>
            <label for="phone">Téléphone :</label>
            <input type="text" name="phone" id="phone" value="{{ $guide->phone }}" required>
        </div>
        <button type="submit">Modifier</button>
    </form>
@endsection
