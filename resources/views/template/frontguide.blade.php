@extends('template.template-front')


@section('content')
    <!-- Hero Section Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Meet Our Professional Guides</h1>
                    <p class="fs-4 text-white mb-4 animated slideInDown">Explore the world with experienced and skilled guides.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Guides Section Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Our Guides</h6>
                <h1 class="mb-5">Meet Our Amazing Guides</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($guides as $guide)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item">
                            <div class="text-center p-4">
                                <img src="{{ asset('images/guides/' . $guide->image) }}" alt="{{ $guide->name }}" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                                <h3>{{ $guide->name }}</h3>
                                <p><strong>Experience:</strong> {{ $guide->experience_years }} years</p>
                                <p><strong>Email:</strong> {{ $guide->email }}</p>
                                <p><strong>Phone:</strong> {{ $guide->phone }}</p>
                                <div class="text-center mt-3">
                                    <a href="{{ route('guide_tours', ['guideId' => $guide->id]) }}">Voir les tours</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Guides Section End -->
@endsection




