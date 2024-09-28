@extends('layout')

@section('content')
    <h1>Modifier le voyage</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gestionVoyage.update', $trip->id) }}" method="POST">
    @csrf
        @method('PUT')
        <div class="form-group">
            <label for="destination">Destination</label>
            <input type="text" name="destination" id="destination" class="form-control" value="{{ $trip->destination }}">
        </div>

        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $trip->start_date }}">
        </div>

        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $trip->end_date }}">
        </div>

        <div class="form-group">
            <label for="cost">Coût</label>
            <input type="number" name="cost" id="cost" class="form-control" value="{{ $trip->cost }}">
        </div>

        <div class="form-group">
            <label for="traveler_id">Voyageur</label>
            <select name="traveler_id" id="traveler_id" class="form-control">
                @foreach($travelers as $traveler)
                    <option value="{{ $traveler->id }}" {{ $traveler->id == $trip->traveler_id ? 'selected' : '' }}>
                        {{ $traveler->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
        <a href="{{ route('gestionVoyage.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection

