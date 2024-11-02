<?php

// Controllers
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TravelerController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuideTourController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\FrontPageController;

require __DIR__.'/auth.php';

// Public Routes
Route::get('/home', [HomePageController::class, 'home'])->name('home');
Route::get('/', [FrontPageController::class, 'showFrontOffice'])->name('front');
Route::get('/front', [FrontPageController::class, 'showFrontOffice'])->name('front');
Route::get('/front/trips', [TripController::class, 'showTripsList'])->name('trips.list');

/////////////// Routes pour l'admin//////////////////////////////////////////////////////////
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/dashboard', [TripController::class, 'index'])->name('admin.dashboard');
    // autres routes réservées aux administrateurs
    // Resource Routes
Route::resource('destinations', DestinationController::class);
Route::resource('guides', GuideController::class);
Route::resource('tours', TourController::class);
Route::resource('restaurants', RestaurantController::class);
Route::resource('menus', MenuController::class);
Route::resource('events', EventController::class);
Route::resource('tickets', TicketController::class);
// Routes for managing guide assignments to a tour
Route::get('tours/{tour}/assign-guides', [GuideTourController::class, 'create'])->name('guides.assign');
Route::post('tours/{tour}/assign-guides', [GuideTourController::class, 'store'])->name('guides.assign.store');
Route::resource('guidetours', GuideTourController::class);

// Byserine routes
// Route::resource('gestionVoyageur', TravelerController::class);
Route::resource('gestionVoyage', TripController::class);
Route::resource('gestionVoyageur', TravelerController::class);

// Route::get('/gestionVoyageur/{id}/edit', [TravelerController::class, 'edit'])->name('gestionVoyageur.edit');
// Route::put('/gestionVoyageur/{id}', [TravelerController::class, 'update'])->name('gestionVoyageur.update');
// Route::delete('/gestionVoyageur/{id}', [TravelerController::class, 'destroy'])->name('gestionVoyageur.destroy');

});

/////////////////// Routes pour les utilisateurs (front office)//////////////////////////////////////////
Route::middleware(['auth', 'role:user'])->group(function () {
    // Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');

    // Route::get('/front-office', [FrontOfficeController::class, 'index'])->name('frontOffice');
});



// Artisan command route
Route::get('/storage', function () {
    Artisan::call('storage:link');
});

// UI Pages Routes
Route::get('/ui', [HomeController::class, 'uisheet'])->name('uisheet');

// Authenticated Routes
Route::group(['middleware' => 'auth'], function () {
    Route::resource('accommodations', AccommodationController::class);
    Route::resource('bookings', BookingController::class);

    // Permission Module
    Route::get('/role-permission', [RolePermission::class, 'index'])->name('role.permission.list');
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);

    // Dashboard Routes

    // Users Module
    Route::resource('users', UserController::class);
});

// App Details Page => 'Dashboard'
Route::group(['prefix' => 'menu-style'], function () {
    // MenuStyle Page Routes
    Route::get('horizontal', [HomeController::class, 'horizontal'])->name('menu-style.horizontal');
    Route::get('dual-horizontal', [HomeController::class, 'dualhorizontal'])->name('menu-style.dualhorizontal');
    Route::get('dual-compact', [HomeController::class, 'dualcompact'])->name('menu-style.dualcompact');
    Route::get('boxed', [HomeController::class, 'boxed'])->name('menu-style.boxed');
    Route::get('boxed-fancy', [HomeController::class, 'boxedfancy'])->name('menu-style.boxedfancy');
});

// Special Pages
Route::group(['prefix' => 'special-pages'], function () {
    Route::get('billing', [HomeController::class, 'billing'])->name('special-pages.billing');
    Route::get('calendar', [HomeController::class, 'calendar'])->name('special-pages.calendar');
    Route::get('kanban', [HomeController::class, 'kanban'])->name('special-pages.kanban');
    Route::get('pricing', [HomeController::class, 'pricing'])->name('special-pages.pricing');
    Route::get('rtl-support', [HomeController::class, 'rtlsupport'])->name('special-pages.rtlsupport');
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});

// Widget Routes
Route::group(['prefix' => 'widget'], function () {
    Route::get('widget-basic', [HomeController::class, 'widgetbasic'])->name('widget.widgetbasic');
    Route::get('widget-chart', [HomeController::class, 'widgetchart'])->name('widget.widgetchart');
    Route::get('widget-card', [HomeController::class, 'widgetcard'])->name('widget.widgetcard');
});

// Maps Routes
Route::group(['prefix' => 'maps'], function () {
    Route::get('google', [HomeController::class, 'google'])->name('maps.google');
    Route::get('vector', [HomeController::class, 'vector'])->name('maps.vector');
});

// Auth pages Routes
Route::group(['prefix' => 'auth'], function () {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
    Route::get('signup', [HomeController::class, 'signup'])->name('auth.signup');
    Route::get('confirmmail', [HomeController::class, 'confirmmail'])->name('auth.confirmmail');
    Route::get('lockscreen', [HomeController::class, 'lockscreen'])->name('auth.lockscreen');
    Route::get('recoverpw', [HomeController::class, 'recoverpw'])->name('auth.recoverpw');
    Route::get('userprivacysetting', [HomeController::class, 'userprivacysetting'])->name('auth.userprivacysetting');
});

// Error Page Routes
Route::group(['prefix' => 'errors'], function () {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});

// Forms Pages Routes
Route::group(['prefix' => 'forms'], function () {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});

// Table Page Routes
Route::group(['prefix' => 'table'], function () {
    Route::get('bootstraptable', [HomeController::class, 'bootstraptable'])->name('table.bootstraptable');
    Route::get('datatable', [HomeController::class, 'datatable'])->name('table.datatable');
});

// Icons Page Routes
Route::group(['prefix' => 'icons'], function () {
    Route::get('solid', [HomeController::class, 'solid'])->name('icons.solid');
    Route::get('outline', [HomeController::class, 'outline'])->name('icons.outline');
    Route::get('dualtone', [HomeController::class, 'dualtone'])->name('icons.dualtone');
    Route::get('colored', [HomeController::class, 'colored'])->name('icons.colored');
});

// Extra Page Routes
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');
Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');