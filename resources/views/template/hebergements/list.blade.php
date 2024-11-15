
@extends('template.template-front')


@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">All Accomodations</h6>
                <h1 class="mb-5">Explore Our Accomodations</h1>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach($accomodations as $Accomodation)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item border">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('images/img/package-1.jpg') }}" alt="{{ $Accomodation->name }}">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $Accomodation->getAddress() }}
                                </small>
                            </div>
                            <div class="text-center p-4">
                                <h3 class="mb-0">{{ number_format($Accomodation->price_per_night, 2) }} DT</h3>
                                <div class="mb-3">
                                    @for ($i = 0; $i < 5; $i++)
                                        <small class="fa fa-star text-primary"></small>
                                    @endfor
                                </div>
                                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam eos.</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="#" class="btn btn-sm btn-primary px-6 border-end" style="border-radius:0;">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
