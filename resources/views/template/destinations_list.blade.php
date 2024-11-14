<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('images/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Tunis</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+216 21 225 321</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>farah@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Tourist</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                 <a href="{{ url('/front/ ') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ url('/front/destinations') }}" class="nav-item nav-link active">Destination</a>
                    <a href="{{ url('/front/events') }}" class="nav-item nav-link">Events</a>
                    <a href="" class="nav-item nav-link">Restaurents</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="destination.html" class="dropdown-item">Destination</a>
                            <a href="booking.html" class="dropdown-item">Booking</a>
                            <a href="team.html" class="dropdown-item">Travel Guides</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div> -->
                    <a href="{{ route('trips.list') }}" class="nav-item nav-link">Trips</a>
                    <a href="" class="nav-item nav-link">Hosting</a>
                    <a href="" class="nav-item nav-link">Guids</a>
                </div>
                <!-- <a href="" class="btn btn-primary rounded-pill py-2 px-4">Hosting</a> -->
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">Tempor erat elitr rebum at clita diam amet diam et eos erat ipsum lorem sit</p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                            

                            <!-- Liste déroulante pour le type d'attraction -->
                            <select id="attractionType" class="form-select border-0 rounded-pill w-100 py-2 ps-4 pe-5 mb-2">
                                <option value="">-- Sélectionnez le type d'attraction --</option>
                                <option value="Culturelle">Culturelle</option>
                                <option value="Naturelle">Naturelle</option>
                                <option value="Historique">Historique</option>
                                <option value="Aventure">Aventure</option>
                                <option value="Religieuse">Religieuse</option>
                                <option value="Éducative">Éducative</option>
                                <option value="Ludique">Ludique</option>
                                <option value="Gastronomique">Gastronomique</option>
                                <option value="Sportive">Sportive</option>
                                <option value="All">All</option>
                            </select>

                            <button id="searchButton" type="button" class="btn btn-primary rounded-pill  px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">
                                Search
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->



    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Solutions</h6>
                <h1 class="mb-5">Explore Our Destinations</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($destinations as $destination)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            @if($destination->image)
                            <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" style="width: 400px; height: 400px;">
                            @else
                            No Image
                            @endif
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $destination->getAddress() }}
                            </small>
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($destination->date)->diffForHumans() }}
                            </small>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-user text-primary me-2"></i>{{ $destination->attractions->count() }} Attractions
                            </small>
                        </div>
                        <div class="text-center p-4">
                            @if($destination->attractions->isNotEmpty())
                            <h3 class="text-danger">
                                🎉 Il y a {{ $destination->attractions->count() }} attraction(s) 🎉
                            </h3>
                            @foreach($destination->attractions as $attraction)
                            <h3 class="mb-0"> {{ $attraction->name }} de type : {{ $attraction->type }}</h3>
                            @endforeach
                            @else
                            <h3 class="text-danger">Malheureusement, pas d'attraction</h3>
                            @endif

                            <div class="mb-3">
                                @for ($i = 0; $i < 5; $i++)
                                    <small class="fa fa-star text-primary"></small>
                                    @endfor
                            </div>

                            <p>{{ $destination->description }}</p>

                            <div class="d-flex justify-content-center mb-2">
                                <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>



    </div>




    <!-- JavaScript Libraries -->
    <script>
        document.getElementById('searchButton').addEventListener('click', function() {
            const attractionType = document.getElementById('attractionType').value;

            if (!attractionType) {
                alert("Veuillez sélectionner un type d'attraction.");
                return;
            }

            // Send an AJAX request to retrieve destinations based on the attraction type
            $.ajax({
                url: '/search', // URL of the route that returns destinations
                method: 'GET',
                data: {
                    type: attractionType

                },
                success: function(response) {
                    const destinationsContainer = document.querySelector('.row.g-4.justify-content-center');
                    destinationsContainer.innerHTML = ''; // Reset displayed results

                    if (response.destinations && response.destinations.length > 0) {
                        response.destinations.forEach(function(destination) {
                            const destinationElement = document.createElement('div');
                            destinationElement.classList.add('col-lg-4', 'col-md-6', 'wow', 'fadeInUp');
                            destinationElement.setAttribute('data-wow-delay', '0.1s');

                            // Check if attractions exist for the destination
                            const attractionsHtml = destination.attractions && destination.attractions.length > 0 ?
                                `
                                <h3 class="text-danger">
                                    🎉 Il y a ${destination.attractions.length} attraction(s) 🎉
                                </h3>
                                ${destination.attractions.map(attraction => 
                                    `<h3 class="mb-0">${attraction.name} de type : ${attraction.type}</h3>`
                                ).join('')}
                              ` :
                                `<h3 class="text-danger">Malheureusement, pas d'attraction</h3>`;

                            // Populate the HTML with destination details
                            destinationElement.innerHTML = `
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    ${destination.image 
                                        ? `<img src="/storage/${destination.image}" alt="${destination.name}" style="width: 400px; height: 400px;">`
                                        : 'No Image'}
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-map-marker-alt text-primary me-2"></i>${destination.address}
                                    </small>
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-calendar-alt text-primary me-2"></i>${destination.date}
                                    </small>
                                </div>
                                <div class="text-center p-4">
                                    ${attractionsHtml}
                                    <div class="mb-3">
                                        ${[...Array(5)].map(() => 
                                            `<small class="fa fa-star text-primary"></small>`
                                        ).join('')}
                                    </div>
                                    <p>${destination.description}</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                                    </div>
                                </div>
                            </div>
                        `;
                            destinationsContainer.appendChild(destinationElement);
                        });
                    } else {
                        destinationsContainer.innerHTML = '<p>No destinations found matching the selected type.</p>';
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erreur AJAX:', error);
                    alert("Une erreur est survenue. Veuillez réessayer.");
                }
            });
        });
    </script>



    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/tempusdominus-bootstrap-4.min.css">
    <script src="/js/wow.min.js"></script>
    <script src="/js/easing.min.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/moment-timezone.min.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/node_modules/moment/min/moment.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/easing.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>