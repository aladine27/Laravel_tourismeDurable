<x-app-layout :assets="$assets ?? []">
    <div class="accommodations-content">
        <h1>Accommodations</h1>
        <a href="{{ route('accommodations.create') }}" class="btn btn-primary mb-3">Create Accommodation</a>

        <!-- Table to display the list of accommodations -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Price per Night</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($accommodations as $accommodation)
                <tr>
                    <td>{{ $accommodation->id }}</td>
                    <td>
                        <a href="{{ route('accommodations.show', $accommodation) }}">{{ $accommodation->name }}</a>
                    </td>
                    <td>{{ $accommodation->address }}</td>
                    <td>{{ $accommodation->price_per_night }} $</td>
                    <td>
                        <!-- Button to edit the accommodation -->
                        <a href="{{ route('accommodations.edit', $accommodation) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Form to delete the accommodation -->
                        <form action="{{ route('accommodations.destroy', $accommodation) }}" method="POST" style="display: inline;">
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
        .accommodations-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
