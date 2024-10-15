<x-app-layout>
    <div class="container">
      

        <form action="{{ route('guides.update', $guide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $guide->name }}" required>
            </div>

            <div class="mb-3">
                <label for="experience_years" class="form-label">Experience Years</label>
                <input type="number" name="experience_years" id="experience_years" class="form-control" value="{{ $guide->experience_years }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $guide->email }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $guide->phone }}" required>
            </div>
            <div class="mb-3">
                     <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">

                     @if($guide->image)
                    <img src="{{ asset('storage/' . $guide->image) }}" alt="Guide Image" width="100">
                    @endif
    </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Guide</button>
                <a href="{{ route('guides.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
