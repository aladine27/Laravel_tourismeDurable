<x-app-layout :assets="$assets ?? []">
    <div class="transporteur-content">
        <h1>Modifier un Transporteur</h1>

        <form action="{{ route('transporteurs.update', $transporteur->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $transporteur->name }}" required>
            </div>

            <div class="mb-3">
                <label for="company_name" class="form-label">Nom de l'Entreprise</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $transporteur->company_name }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ $transporteur->phone }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $transporteur->email }}" required>
                <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email avec quiconque.</div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Mettre à Jour le Transporteur</button>
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
