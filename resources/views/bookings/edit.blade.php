<x-app-layout :assets="$assets ?? []">
    <div class="booking-form">
        <h1>Modifier Réservation</h1>

        <form action="{{ route('bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="accommodation_id" class="form-label">Hébergement</label>
                <select name="accommodation_id" id="accommodation_id" class="form-select" required>
                    @foreach($accommodations as $accommodation)
                        <option value="{{ $accommodation->id }}" {{ old('accommodation_id', $booking->accommodation_id) == $accommodation->id ? 'selected' : '' }}>
                            {{ $accommodation->name }}
                        </option>
                    @endforeach
                </select>
                @error('accommodation_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="check_in_date" class="form-label">Check-in Date</label>
                <input type="date" name="check_in_date" id="check_in_date" class="form-control" value="{{ old('check_in_date', $booking->check_in_date) }}" required>
                @error('check_in_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="check_out_date" class="form-label">Check-out Date</label>
                <input type="date" name="check_out_date" id="check_out_date" class="form-control" value="{{ old('check_out_date', $booking->check_out_date) }}" required>
                @error('check_out_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="total_price" class="form-label">Prix total</label>
                <input type="number" name="total_price" id="total_price" class="form-control" value="{{ old('total_price', $booking->total_price) }}" required>
                @error('total_price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Modifier Réservation</button>
            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <style>
        .booking-form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
