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
    <li class="nav-item">
    <a class="nav-link {{ activeRoute(route('events.index')) }}" aria-current="page" href="{{ route('events.index') }}">
        <i class="icon">
            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
            </svg>
        </i>
        <span class="item-name">Nos Événements</span>
    </a>

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
</li>
<li class="nav-item">
    <a class="nav-link {{ activeRoute(route('destinations.index')) }}" aria-current="page" href="{{ route('destinations.index') }}">
        <i class="icon">
            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.4" d="M3 6.5C3 5.12 4.12 4 5.5 4H18.5C19.88 4 21 5.12 21 6.5V17.5C21 18.88 19.88 20 18.5 20H5.5C4.12 20 3 18.88 3 17.5V6.5Z" fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 11H8V13H16V11Z" fill="currentColor"></path>
            </svg>
        </i>
        <span class="item-name">Nos Destinations</span>
    </a>
</li>
 <!--
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                    <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                    <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Menu Style</span>
            <i class="right-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </i>
        </a>
        <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar">
            <li class="nav-item ">
                <a class="nav-link {{activeRoute(route('menu-style.horizontal'))}}" href="{{route('menu-style.horizontal')}}">
                  <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                  <i class="sidenav-mini-icon"> H </i>
                  <span class="item-name"> Horizontal </span>
                </a>
            </li>
            <li class=" nav-item ">
                <a class="nav-link {{activeRoute(route('menu-style.dualhorizontal'))}}" href="{{route('menu-style.dualhorizontal')}}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> D </i>
                    <span class="item-name">Dual Horizontal</span>
                </a>
            </li>
            <li class=" nav-item ">
                <a class="nav-link {{activeRoute(route('menu-style.dualcompact'))}}" href="{{route('menu-style.dualcompact')}}">
                    <i class="icon svg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> D </i>
                    <span class="item-name">Dual Compact</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{activeRoute(route('menu-style.boxed'))}}" href="{{route('menu-style.boxed')}}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> B </i>
                    <span class="item-name">Boxed Horizontal</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{activeRoute(route('menu-style.boxedfancy'))}}" href="{{route('menu-style.boxedfancy')}}">
                    <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                            <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                            </g>
                        </svg>
                    </i>
                    <i class="sidenav-mini-icon"> B </i>
                    <span class="item-name">Boxed Fancy</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{route('uisheet')}}" target="_blank">
            <i class="icon">
                 <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>
                    <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>
                </svg>
            </i>
            <span>Design System<span class="badge rounded-pill bg-success">UI</span></span>
        </a>
    </li>
    <li><hr class="hr-horizontal"></li>
    <li class="nav-item static-item">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Pages</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-special-pages" role="button"  aria-expanded="false" aria-controls="sidebar-special-pages">

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
 <!-- Restaurant Link -->
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
