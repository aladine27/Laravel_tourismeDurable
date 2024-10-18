<x-app-layout :assets="$assets ?? []">
    <div class="bookings-content">
        <h1>Réservations</h1>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Créer Réservation</a>

        <!-- Table to display the list of bookings -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom d'hébergement</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Prix total</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>
                        <a href="{{ route('accommodations.show', $booking->accommodation) }}">{{ $booking->accommodation->name }}</a>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                    <td>${{ $booking->total_price }}</td>
                    <td>
                        <!-- Button to edit the booking -->
                        <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-warning btn-sm">Modifier</a>

                        <!-- Form to delete the booking -->
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .bookings-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
