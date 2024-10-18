@extends('layouts.app')

@section('content')
    <h1>Détails de la Visite</h1>
    <p><strong>Titre :</strong> {{ $tour->title }}</p>
    <p><strong>Description :</strong> {{ $tour->description }}</p>
    <p><strong>Date :</strong> {{ $tour->date }}</p>
    <p><strong>Durée :</strong> {{ $tour->duration }} heures</p>
    <p><strong>Prix :</strong> {{ $tour->price }} $</p>
    <a href="{{ route('tours.index') }}">Retour à la liste des Visites</a>
@endsection
