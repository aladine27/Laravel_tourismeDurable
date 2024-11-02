<x-app-layout :assets="$assets ?? []">
    <div class="events-content">
        <h1>Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create Event</a>

        <!-- Table to display the list of events -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>
                            <a href="{{ route('events.show', $event) }}">{{ $event->name }}</a>
                        </td>
                        <td class="text-wrap">{{ $event->description }}</td> <!-- Add class for word wrapping -->
                        <td>{{ \Carbon\Carbon::parse($event->date)->format('d-m-Y') }}</td>
                        <td class="text-wrap">{{ $event->getAddress() }}</td> <!-- Use the getAddress method -->
                        <td>
                            <!-- Button to edit the event -->
                            <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Form to delete the event -->
                            <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .events-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        /* Add styles for word wrapping */
        .text-wrap {
            white-space: normal; /* Allows text to wrap */
            word-wrap: break-word; /* Breaks long words */
            max-width: 200px; /* Set a maximum width for the cell */
        }

        /* Optional: Adjust the table to handle overflow better */
        table {
            table-layout: auto; /* Let the browser decide the layout */
            width: 100%; /* Full width */
        }
    </style>
</x-app-layout>
