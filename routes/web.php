<?php

use App\Models\DriverRating;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassController;
use App\Http\Controllers\TrajeController;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\CertifierController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\CoordonneesController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DriverRatingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/marche', function () {
    return view('marche');
});



Route::get('/marche-coonducteur', function () {
    return view('marcher');
});

Route::get('/conditions', function () {
    return view('conditions');
});

Route::get('/politique', function () {
    return view('politique');
});


Route::get('rides', function () {
    return view('auth.ride');
});

Route::get('chat', function () {
    return view('chat');
});
Route::put('/reservations/{id}/cancel', [ReservationController::class,'cancelReservation'])->name('reservations.cancel');


Route::get('/my-reservations', [ReservationController::class, 'myReservations'])->name('reservations.my_reservations');


Route::delete('/reservations/{reservation}', [ReservationController::class,'delete'])->name('reservations.delete');



Route::middleware(['auth', 'passager'])->group(function () {
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
});

Route::post('/create/{trajet}', [ReservationController::class, 'create'])->name('reservation.create');

Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');

Route::get('/traj',[TrajetController::class,'filtrer'])->name('trajets.filtrer');

Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/comment/{id}', [TrajetController::class,'detailsTrajets'])->name('trajets.comment');

Route::get('/traje/{id}', [TrajetController::class,'trajets'])->name('trajets.comme');

// Route pour soumettre le formulaire de création d'avis
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Route pour afficher les avis de l'utilisateur
Route::get('/reviews', [ReviewController::class, 'show'])->name('reviews.show');

Route::get('/rechercher/trajets', [TrajetController::class,'search'])->name('search.trajets');

Route::post('/trajets/finalisation', [TrajeController::class, 'finalisation'])->name('trajets.finalisation');

Route::middleware(['auth', 'passager'])->group(function () {
    Route::resource('voitures', VoitureController::class);
});
// Afficher la liste des conversations

Route::get('/preferences', [PreferenceController::class, 'showPreferences'])->name('preferences');

Route::get('/details/{id}', [TrajetController::class, 'detailsTrajets'])->name('trajets.details');

Route::post('/reservation/{trajet}', [ReservationController::class,'reserve'])->name('reservation.reserve');

Route::middleware(['auth','conducteur'])->group(function(){
    Route::get('/conducteurs', [TrajetController::class, 'afficherTrajets'])->name('trajets.conducteurs');

});

// web.php
Route::get('/traje/create', [TrajeController::class, 'create'])->name('traje.create');

Route::post('/traje', [TrajeController::class, 'store'])->name('trajet.store');

Route::get('prime', function () {
    return view('auth.prime');
});

Route::post('/reservation/{reservation}/response', [ReservationController::class, 'handleResponse'])->name('reservation.response');

Route::get('/certifier-email', [CertifierController::class, 'afficherVueCertification'])->name('certifier-email');

Route::post('/valider-certification', [CertifierController::class, 'validerCertification'])->name('valider-certification');

Route::get('/coordonnees', [CoordonneesController::class,'afficherCoordonnees']);

Route::get('/trajets/search', [TrajetController::class, 'searchForm'])->name('trajets.search');

Route::get('/trajets/rechercher', [TrajetController::class, 'search'])->name('trajets.search.submit');


Route::middleware(['passager', 'auth'])->group(function () {
    Route::resource('trajets', TrajetController::class);
});

Route::post('/trajets/{id}/annuler', [TrajetController::class,'annuler'])->name('trajets.annuler');



Route::get('passager', function () {
    return view('auth.passager');
});


Route::middleware(['auth', 'passager'])->group(function () {
    Route::get('/pass', [PassController::class, 'index'])->name('pass');
});

Route::get('trajet', function () {
    return view('auth.trajet');
});

// Afficher le formulaire d'alerte
Route::get('/alerte', [AlerteController::class, 'create'])->name('alerte.create');

// Soumettre le formulaire d'alerte
Route::post('/alerte', [AlerteController::class, 'store'])->name('alerte.store');

Route::get('inscription', function () {
    return view('inscription');
});
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::get('/messages/create1', [MessageController::class, 'create1'])->name('messages.create1');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/{conversation}', [MessageController::class, 'show'])->name('messages.show');
Route::post('/messages/{conversation}/reply', [MessageController::class, 'reply'])->name('messages.reply');
Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

Route::get('/messages/index-for-other-user', [MessageController::class,'indexForOtherUser'])->name('messages.index-for-other-user');

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notifications/{notification}', [NotificationController::class, 'show'])->name('notifications.show');

Route::get('/register2', [RegisteredUserController::class, 'create2'])->name('register2');
Route::post('/register2', [RegisteredUserController::class, 'store2'])->name('register2');

Route::get('/register', [RegisteredUserController::class, 'create1'])->name('register');

Route::post('/register', [RegisteredUserController::class, 'store1']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/preferences/create', [PreferenceController::class, 'create'])->name('preferences.create');

Route::post('/preferences', [PreferenceController::class, 'store'])->name('preferences.store');

Route::get('/preference',[PreferenceController::class, 'index'])->name('preferences.index');

Route::post('/preferenc',[PreferenceController::class, 'update'])->name('preferences.update');

Route::delete('/preferencess', [PreferenceController::class, 'destroy'])->name('preferences.destroy');

Route::get('/preferences/edit', [PreferenceController::class, 'edit'])->name('preferences.edit');

Route::get('/dashboard/create', [DashboardController::class, 'create']);
Route::post('/dashboard/users', [DashboardController::class, 'store']);
Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit']);
Route::put('/dashboard//{id}', [DashboardController::class, 'update']);
Route::delete('/dashboard//{id}', [DashboardController::class, 'destroy']);

Route::get('/gestion',[TrajetController::class,'manage'])->name('gestion.manage');
require __DIR__.'/auth.php';
