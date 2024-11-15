@extends('template.template-front')


@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">All Trips</h6>
                <h1 class="mb-5">Explore Our Trips</h1>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach($trips as $trip)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item border">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('images/img/package-1.jpg') }}" alt="{{ $trip->destination }}">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $trip->destination }}
                                </small>
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-calendar-alt text-primary me-2"></i>
                                    {{ \Carbon\Carbon::parse($trip->start_date)->diffInDays($trip->end_date) }} days
                                </small>
                                <small class="flex-fill text-center py-2">
                                    <i class="fa fa-user text-primary me-2"></i>{{ $trip->travelers_count }} Person{{ $trip->travelers_count > 1 ? 's' : '' }}
                                </small>
                            </div>
                            <div class="text-center p-4">
                                <h3 class="mb-0">${{ number_format($trip->cost, 2) }}</h3>
                                <div class="mb-3">
                                    @for ($i = 0; $i < 5; $i++)
                                        <small class="fa fa-star text-primary"></small>
                                    @endfor
                                </div>
                                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam eos.</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="#" class="btn btn-sm btn-primary px-6 border-end" style="border-radius: 0px 0 0 0px;">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection



