@extends('layout')

@section('content')
    <h1>Ajouter un voyageur</h1>

    <form action="{{ route('gestionVoyageur.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection