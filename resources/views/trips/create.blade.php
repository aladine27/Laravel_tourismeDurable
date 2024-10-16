@extends('layout')

@section('content')
    <h1>Créer un nouveau voyage</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gestionVoyage.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="destination">Destination</label>
            <input type="text" name="destination" id="destination" class="form-control" value="{{ old('destination') }}" required>
        </div>

        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" required>
        </div>

        <div class="form-group">
            <label for="cost">Coût</label>
            <input type="number" name="cost" id="cost" class="form-control" value="{{ old('cost') }}" required>
        </div>

<div class="form-group">
    <label for="traveler_ids">Voyageurs</label>
    <select name="traveler_ids[]" id="traveler_ids" class="form-control" multiple>
        @foreach($travelers as $traveler)
            <option value="{{ $traveler->id }}">{{ $traveler->name }}</option>
        @endforeach
    </select>
</div>

        <button type="submit" class="btn btn-primary mt-3">Créer</button>
    </form>
@endsection
