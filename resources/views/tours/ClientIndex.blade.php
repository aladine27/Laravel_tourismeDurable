@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tours Disponibles</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        @foreach ($tours as $tour)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">{{ $tour->title }}</div>
                    <div class="card-body">
                        <p>{{ $tour->description }}</p>
                        <p>Places disponibles : {{ $tour->nb_place }}</p>
                        <form action="{{ route('tours.reserve', $tour->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
