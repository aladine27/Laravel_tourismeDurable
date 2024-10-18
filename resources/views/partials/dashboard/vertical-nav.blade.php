
<div class="sidebar-wrapper" style="height: 100vh; overflow-y: auto;">
<ul class="navbar-nav iq-main-menu"  id="sidebar">
    <li class="nav-item static-item">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Home</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{activeRoute(route('dashboard'))}}" aria-current="page" href="{{route('dashboard')}}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Dashboard</span>
        </a>
    </li>



    <li><hr class="hr-horizontal"></li>
  

     <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('tours.index')) }}" href="{{ route('tours.index') }}">

            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Tours</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('guidetours.index')) }}" href="{{ route('guidetours.index') }}">

            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Tours Guidé</span>
        </a>
    </li>
     <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('guides.index')) }}" href="{{ route('guides.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.31 0-10 1.67-10 5v2h20v-2c0-3.33-6.69-5-10-5z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Guides</span>
        </a>
    </li>
    <li class="nav-item">
    <a class="nav-link {{ activeRoute(route('tickets.index')) }}" aria-current="page" href="{{ route('tickets.index') }}">
        <i class="icon">
            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.4" d="M3 6.5C3 5.12 4.12 4 5.5 4H18.5C19.88 4 21 5.12 21 6.5V17.5C21 18.88 19.88 20 18.5 20H5.5C4.12 20 3 18.88 3 17.5V6.5Z" fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 11H8V13H16V11Z" fill="currentColor"></path>
            </svg>
        </i>
        <span class="item-name">NosTickets</span>
    </a>
</li>
 <!-- Events Link -->
 <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('events.index')) }}" aria-current="page" href="{{ route('events.index') }}">
            <i class="icon">
            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.4" d="M3 6.5C3 5.12 4.12 4 5.5 4H18.5C19.88 4 21 5.12 21 6.5V17.5C21 18.88 19.88 20 18.5 20H5.5C4.12 20 3 18.88 3 17.5V6.5Z" fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 11H8V13H16V11Z" fill="currentColor"></path>
            </svg>
            </i>
            <span class="item-name">Evenements</span>
        </a>
</li>
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('accommodations.index')) }}" aria-current="page" href="{{ route('accommodations.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M3 6.5C3 5.12 4.12 4 5.5 4H18.5C19.88 4 21 5.12 21 6.5V17.5C21 18.88 19.88 20 18.5 20H5.5C4.12 20 3 18.88 3 17.5V6.5Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 11H8V13H16V11Z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Nos Hébergements</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('bookings.index')) }}" aria-current="page" href="{{ route('bookings.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M3 6.5C3 5.12 4.12 4 5.5 4H18.5C19.88 4 21 5.12 21 6.5V17.5C21 18.88 19.88 20 18.5 20H5.5C4.12 20 3 18.88 3 17.5V6.5Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 11H8V13H16V11Z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Nos Réservations</span>
        </a>
    </li>

 <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('restaurants.index')) }}" aria-current="page" href="{{ route('restaurants.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12C15.3137 12 18 9.31371 18 6C18 2.68629 15.3137 0 12 0C8.68629 0 6 2.68629 6 6C6 9.31371 8.68629 12 12 12Z" fill="currentColor" />
                    <path d="M0 24C0 17.3726 6.37258 12 12 12C17.6274 12 24 17.3726 24 24H0Z" fill="currentColor" />
                </svg>
            </i>
            <span class="item-name">Restaurants</span>
        </a>
</li>

<li class="nav-item">
        <a class="nav-link {{ activeRoute(route('menus.index')) }}" aria-current="page" href="{{ route('menus.index') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12C15.3137 12 18 9.31371 18 6C18 2.68629 15.3137 0 12 0C8.68629 0 6 2.68629 6 6C6 9.31371 8.68629 12 12 12Z" fill="currentColor" />
                    <path d="M0 24C0 17.3726 6.37258 12 12 12C17.6274 12 24 17.3726 24 24H0Z" fill="currentColor" />
                </svg>
            </i>
            <span class="item-name">Menus</span>
        </a>
</li>

 <!-- Destination Link -->
 <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('destinations.index')) }}" aria-current="page" href="{{ route('destinations.index') }}">
            <i class="icon">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
            </svg>
            </i>
            <span class="item-name">Destinations</span>
        </a>
</li>
 <!-- Trips Link -->
 <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('gestionVoyage.index')) }}" aria-current="page" href="{{ route('gestionVoyage.index') }}">
            <i class="icon">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
            </svg>
            </i>
            <span class="item-name">Gestion Voyage</span>
        </a>
</li>
 <!-- Travelers Link -->
 <li class="nav-item">
        <a class="nav-link {{ activeRoute(route('gestionVoyageur.index')) }}" aria-current="page" href="{{ route('gestionVoyageur.index') }}">
            <i class="icon">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
            </svg>
            </i>
            <span class="item-name">Gestion Voyageurs</span>
        </a>
</li>

</ul>
</div>