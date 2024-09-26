<x-app-layout :assets="$assets ?? []">
    <div class="transporteur-content">
        <h1>Créer un Transporteur</h1>

        <form action="{{ route('transporteurs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="company_name" class="form-label">Nom de l'Entreprise</label>
                <input type="text" name="company_name" id="company_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="tel" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
                <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email avec quiconque.</div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Créer un Transporteur</button>
                <a href="{{ route('transporteurs.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <style>
        .transporteur-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
