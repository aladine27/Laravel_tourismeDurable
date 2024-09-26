<x-app-layout :assets="$assets ?? []">
    <div class="event-form">
        <h1>Edit Event</h1>

        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $event->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
    <label for="location" class="form-label">Event Location</label>
    <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $event->location) }}" required>
    @error('location')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="date" class="form-label">Event Date</label>
    <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $event->date) }}" required>
    @error('date')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

            <button type="submit" class="btn btn-primary">Update Event</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <style>
        .event-form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
