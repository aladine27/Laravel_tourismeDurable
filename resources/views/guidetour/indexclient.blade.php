<!-- resources/views/guidetour/indexclient.blade.php -->

<div class="container py-4">
    <!-- Responsive Tour Cards -->
    <div class="row">
        @foreach($tours as $tour)
            <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                <div class="card shadow-sm h-100">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="{{ $tour->title }}">
                    <div class="card-body">
                        <h5 class="card-title text-info">{{ $tour->title }}</h5>
                        <p class="card-text">{{ Str::limit($tour->description, 100) }}</p>
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($tour->date)->format('d M Y') }}</p>
                        <p><strong>Duration:</strong> {{ $tour->duration }} hours</p>
                        <p><strong>Price:</strong> ${{ number_format($tour->price, 2) }}</p>
                        <p><strong>Available Spots:</strong> 
                            <span class="badge badge-pill {{ $tour->nb_place > 0 ? 'badge-success' : 'badge-danger' }}">
                                {{ $tour->nb_place }}
                            </span>
                        </p>

                        <!-- Display the associated guides -->
                        <p><strong>Guides:</strong></p>
                        <ul>
                            @forelse($tour->guides as $guide)
                                <li>{{ $guide->name }} ({{ $guide->experience_years }} years experience)</li>
                            @empty
                                <li>No guide assigned yet.</li>
                            @endforelse
                        </ul>

                        @if($tour->nb_place > 0)
                            <form action="{{ route('tours.participate', $tour->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block">Participate</button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-block" disabled>No spots available</button>
                        @endif
                    </div>
                    <div class="card-footer bg-light text-center">
                        <small class="text-muted">Posted on {{ \Carbon\Carbon::parse($tour->created_at)->format('d M Y') }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
