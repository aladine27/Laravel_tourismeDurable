<x-app-layout :assets="$assets ?? []">
    <div class="ticket-content">
        <h1>Create Ticket</h1>

        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="event_id" class="form-label">Event</label>
                <select name="event_id" id="event_id" class="form-control" required>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create Ticket</button>
                <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <style>
        .ticket-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        /* Add optional styles to make the form look more polished */
        .form-label {
            font-weight: bold; /* Bold labels */
        }

        .btn {
            margin-right: 10px; /* Add spacing between buttons */
        }
    </style>
</x-app-layout>
