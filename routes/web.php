<?php

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UpcomingTripController;
use App\Models\Experience;
use App\Models\Trip;
use Illuminate\Support\Facades\Route;

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

Route::get('/experience', function () {
    $experiences = Experience::all(); // Fetch all experiences
    $trips = Trip::all(); // Fetch all experiences
    return view('Experience', compact('experiences','trips'));
});


Route::get('/experiences/{id}', [ExperienceController::class, 'ShowExperience'])->name('experience.show');


Route::get('/contact', function () {
    return view('Contact');
});


Route::get('/blog', function () {
    return view('Blog');
});


Route::get('/upcoming_trips', function () {
    $trips = Trip::all(); // Fetch all experiences

    return view('Trips',compact('trips'));
});


Route::get('/about', function () {
    return view('About');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Experiences
Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
Route::get('/experiences_create', [ExperienceController::class, 'createExperience'])->name('experiences.create');
Route::post('/experiences', [ExperienceController::class, 'store'])->name('experiences.store');
Route::get('/experiences/{experience}', [ExperienceController::class, 'show'])->name('experiences.show');
Route::get('/experiences/{experience}/edit', [ExperienceController::class, 'edit'])->name('experiences.edit');
Route::put('/experiences/{experience}', [ExperienceController::class, 'update'])->name('experiences.update');
Route::delete('/experiences/{experience}', [ExperienceController::class, 'destroy'])->name('experiences.destroy');

// Upcoming Trips

// Testimonials
Route::resource('testimonials', TestimonialController::class);

// Contact Messages
Route::resource('contact-messages', ContactMessageController::class);

// About Us
Route::resource('social-media', SocialMediaController::class);

Route::resource('trips', TripController::class);

// Settings
Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');

});

require __DIR__.'/auth.php';
