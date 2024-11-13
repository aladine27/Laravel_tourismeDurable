@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $guide->name }}</h1>
    <p>{{ $guide->description }}</p>

    <h3>Associated Tours</h3>
    <ul>
        @foreach ($guide->tours as $tour)
            <li>{{ $tour->name }} - {{ $tour->description }}</li>
        @endforeach
    </ul>
</div>
@endsection
