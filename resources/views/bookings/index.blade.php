<x-app-layout :assets="$assets ?? []">
    <div class="bookings-content">
        <h1>Bookings</h1>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Create Booking</a>

        <!-- Table to display the list of bookings -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Accommodation Name</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Total Price</th>
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
                        <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Form to delete the booking -->
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display: inline;">
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
        .bookings-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
