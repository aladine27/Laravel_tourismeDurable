@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tours Disponibles</h1>
    <div class="row">
        @foreach($tours as $tour)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>{{ $tour->title }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ $tour->description }}</p>
                    <p><strong>Date:</strong> {{ $tour->date }}</p>
                    <p><strong>Durée:</strong> {{ $tour->duration }} jours</p>
                    <p><strong>Prix:</strong> {{ $tour->price }} €</p>
                    <p><strong>Places Disponibles:</strong> {{ $tour->nb_place }}</p>
                    <form action="{{ route('tours.reserve', $tour->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Inscrire</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
