<x-app-layout :assets="$assets ?? []">
    <div class="booking-content">
        <h1>Créer Réservation</h1>

        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf

            <!-- Accommodation Selection -->
            <div class="mb-3">
                <label for="accommodation_id" class="form-label">Hébergement</label>
                <select name="accommodation_id" id="accommodation_id" class="form-control" required>
                    <option value="" disabled selected>Selectionner un hébergement</option>
                    @foreach($accommodations as $accommodation)
                        <option value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Check-in Date -->
            <div class="mb-3">
                <label for="check_in" class="form-label">Check-in Date</label>
                <input type="date" name="check_in_date" id="check_in" class="form-control" required>
            </div>

            <!-- Check-out Date -->
            <div class="mb-3">
                <label for="check_out" class="form-label">Check-out Date</label>
                <input type="date" name="check_out_date" id="check_out" class="form-control" required>
            </div>

            <!-- Total Price -->
            <div class="mb-3">
                <label for="total_price" class="form-label">Prix total</label>
                <input type="number" name="total_price" id="total_price" class="form-control" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Créer réservation</button>
                <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <style>
        .booking-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
