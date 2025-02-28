<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UpcomingTripController;
use App\Http\Controllers\UserController;
use App\Jobs\SendNewsletterJob;
use App\Mail\NewsletterMail;
use App\Models\Blog;
use App\Models\Experience;
use App\Models\Subscriber;
use App\Models\Trip;
use Illuminate\Support\Facades\Mail;
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
    $blogs=Blog::latest()->take(3)->get();
    $trips=Trip::latest()->take(3)->get();
    $experiences=Experience::latest()->take(3)->get();
    return view('welcome',compact('blogs','trips','experiences'));
});

Route::get('/experience', function () {
    $experiences = Experience::all(); // Fetch all experiences
    $trips = Trip::all(); // Fetch all experiences
    return view('Experience', compact('experiences','trips'));
});
Route::get('/send-newsletter', function () {
    $subscribers = Subscriber::all();
    $trips = Trip::latest()->take(3)->get();
    $content = "Here is the latest update from our travel site. Enjoy exclusive offers and tips!";

    foreach ($subscribers as $subscriber) {
        Mail::to($subscriber->email)->send(new NewsletterMail($content, $trips));
    }

    return back()->with('success', 'Newsletter sent successfully!');
});

Route::get('/experiences/{id}', [ExperienceController::class, 'ShowExperience'])->name('experience.show');

Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');
Route::get('/contact', function () {
    return view('Contact');
});




Route::get('/faqs', function () {
    return view('FAQS');
});


Route::get('/blogs/{id}', [BlogController::class, 'showBlog'])->name('blogs.showBlog');


Route::get('/blog', function () {
    $blogs=Blog::all();
    return view('Blog',compact('blogs'));
});


Route::get('/upcoming_trips', function () {
    $trips = Trip::all(); // Fetch all experiences

    return view('Trips',compact('trips'));
});


Route::get('/about', function () {
    return view('About');
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/trips/book', [TripController::class, 'book'])->name('trip.book');
Route::post('/trips/inquire', [TripController::class, 'inquire'])->name('trip.inquire');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
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

Route::resource('blogs', BlogController::class);

Route::get('/contact-messages', [ContactController::class, 'index'])->name('contact-messages.index'); // Display all contacts

Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::post('/contacts/reply', [ContactController::class, 'reply'])->name('contacts.reply');

// About Us
Route::resource('social-media', SocialMediaController::class);

Route::resource('trips', TripController::class);

Route::post('/inquiries/reply', [InquiryController::class, 'reply'])->name('inquiries.reply');
Route::patch('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');

// Settings
Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');

Route::put('/notifications/{id}', [SettingController::class, 'update'])->name('notifications.update');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
Route::post('/users/{user}/force-delete', [UserController::class, 'forceDelete'])->name('users.force-delete');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');


Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');


Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');


});

require __DIR__.'/auth.php';
