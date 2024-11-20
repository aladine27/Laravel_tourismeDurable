@extends('template.template-front')


@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Welcome</h6>
                <h1 class="mb-5">Tours Associated to This Guide</h1>
            </div>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title bg-white text-center text-primary px-3">Tours</h6>
                        <h1 class="mb-5">Explore Our Tours</h1>
                    </div>
                    <div class="row g-4 justify-content-center">
                        @foreach($guide->tours as $tour)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item bg-white shadow-lg rounded-lg overflow-hidden">
                                    <div class="d-flex border-bottom p-4">
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($tour->date)->format('d-m-Y') }}
                                        </small>
                                        <small class="flex-fill text-center py-2">
                                            <i class="fa fa-clock text-primary me-2"></i>{{ $tour->duration }} days
                                        </small>
                                    </div>
                                    <div class="text-center p-4">
                                        <h4 class="mb-3">{{ $tour->title }}</h4>
                                        <p class="text-gray-600">{{ $tour->description }}</p>
                                        <div class="mb-3">
                                            <strong>Price:</strong> ${{ number_format($tour->price, 2) }}
                                        </div>
                                        <div class="mb-3">
                                            <strong>Available Spots:</strong> {{ $tour->nb_place }}
                                        </div>
                                        <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


@endsection


