<x-app-layout :assets="$assets ?? []">
    <div class="accommodation-form">
        <h1>Edit Accommodation</h1>

        <form action="{{ route('accommodations.update', $accommodation) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Accommodation Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $accommodation->name) }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $accommodation->address) }}" required>
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price_per_night" class="form-label">Price per Night</label>
                <input type="number" name="price_per_night" id="price_per_night" class="form-control" value="{{ old('price_per_night', $accommodation->price_per_night) }}" required>
                @error('price_per_night')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Update Accommodation</button>
            <a href="{{ route('accommodations.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <style>
        .accommodation-form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
