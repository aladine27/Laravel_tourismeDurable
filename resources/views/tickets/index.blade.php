<x-app-layout :assets="$assets ?? []">
    <div class="tickets-content">
        <h1>Tickets</h1>
        <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Create Ticket</a>

        <!-- Container for the ticket cards -->
        <div class="row">
            @foreach ($tickets as $ticket)
                <div class="col-md-4 mb-3"> <!-- Use Bootstrap columns for responsive design -->
                    <div class="card ticket-card">
                        <div class="card-body">
                            <h5 class="card-title">Ticket ID: {{ $ticket->id }}</h5>
                            <p class="card-text">Event: {{ $ticket->event->name }}</p>
                            <p class="card-text">Price: ${{ number_format($ticket->price, 2) }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .tickets-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .ticket-card {
            border: 1px solid #007bff; /* Add a border color for the ticket card */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
            transition: transform 0.2s; /* Animation on hover */
        }

        .ticket-card:hover {
            transform: scale(1.05); /* Scale up on hover */
        }

        /* Optional: Adjust card styling */
        .card-title {
            font-weight: bold;
        }
        
        .card-text {
            margin: 0; /* Remove default margin */
        }
    </style>
</x-app-layout>
