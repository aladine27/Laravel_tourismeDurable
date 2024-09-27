@extends('layouts.app')

@section('content')
    <h1>Détails du Guide</h1>
    <p><strong>Nom :</strong> {{ $guide->name }}</p>
    <p><strong>Email :</strong> {{ $guide->email }}</p>
    <p><strong>Téléphone :</strong> {{ $guide->phone }}</p>
    <p><strong>Années d’expérience :</strong> {{ $guide->experience_years }}</p>
    <a href="{{ route('guides.index') }}">Retour à la liste des Guides</a>
@endsection
