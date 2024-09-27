<x-app-layout>
    <div class="container">
        <h1>Guides</h1>
        <a href="{{ route('guides.create') }}" class="btn btn-primary">Create Guide</a>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Experience Years</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guides as $guide)
                    <tr>
                        <td>{{ $guide->id }}</td>
                        <td><a href="{{ route('guides.show', $guide->id) }}">{{ $guide->name }}</a></td>
                        <td>{{ $guide->experience_years }}</td>
                        <td>{{ $guide->email }}</td>
                        <td>{{ $guide->phone }}</td>
                        <td>
                            <a href="{{ route('guides.edit', $guide->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('guides.destroy', $guide->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
