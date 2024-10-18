<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <h1 class="text-center my-4">Ajouter une Visite</h1>

        <form action="{{ route('tours.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Durée (heures)</label>
                <input type="number" name="duration" id="duration" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="mb-3">
                     <label for="nb_place" class="form-label">Nombre de Places</label>
                    <input type="number" name="nb_place" id="nb_place" class="form-control" required>
            </div>


            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{ route('tours.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <style>
        .container {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
