<!-- resources/views/tickets/edit.blade.php -->
<x-app-layout :assets="$assets ?? []">
    <div class="ticket-content">
        <h1>Edit Ticket</h1>

        <form action="{{ route('tickets.update', $ticket) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="event_id" class="form-label">Event</label>
                <select name="event_id" id="event_id" class="form-control" required>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}" {{ $event->id == $ticket->event_id ? 'selected' : '' }}>
                            {{ $event->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $ticket->price }}" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Ticket</button>
                <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
