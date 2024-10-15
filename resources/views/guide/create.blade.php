<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <h1 class="text-center my-4">Ajouter un Guide</h1>

        <form action="{{ route('guides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="experience_years" class="form-label">Années d'Expérience</label>
                <input type="number" name="experience_years" id="experience_years" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Enregistrer le Guide</button>
                <a href="{{ route('guides.index') }}" class="btn btn-secondary">Annuler</a>
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
