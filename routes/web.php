<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EmergencyController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard (SESSION protected — NOT middleware)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Dashboard Pages
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->name('dashboard');

Route::get('/dashboard/schedule',
    [DonationController::class, 'showSchedule']
)->name('donations.schedule');

Route::post('/dashboard/schedule',
    [DonationController::class, 'storeSchedule']
)->name('donations.schedule.store');

Route::get('/dashboard/manage',
    [DonationController::class, 'manage']
)->name('donations.manage');


    Route::post(
    '/appointments/{id}/reschedule',
    [DonationController::class, 'reschedule']
)->name('appointment.reschedule');


    Route::post('/dashboard/appointment/cancel/{id}',
        [DonationController::class, 'cancel']
    )->name('appointment.cancel');


Route::get('/dashboard/history', function () {
    return view('dashboard.donations.history');
})->name('donations.history');

Route::get('/dashboard/donor-card', [AuthController::class, 'donorCard'])
    ->name('donations.card');
use App\Http\Controllers\DonorController;

Route::get('/dashboard/donor-card/pdf', 
    [AuthController::class, 'downloadDonorCard']
)->name('donations.card.pdf');
Route::get('/donor/{id}/pdf', [DonorController::class, 'downloadPdf'])
    ->name('donor.pdf');

Route::get('/dashboard/blood-drives', function () {
    return view('dashboard.guide.blood-drives');
})->name('guide.drives');

Route::get('/dashboard/eligibility', function () {
    return view('dashboard.guide.eligibility');
})->name('guide.eligibility');

Route::get('/dashboard/donation-types', function () {
    return view('dashboard.guide.donation-types');
})->name('guide.types');

Route::get('/dashboard/common-concerns', function () {
    return view('dashboard.guide.common-concerns');
})->name('guide.concerns');

Route::get('/dashboard/process-overview', function () {
    return view('dashboard.process.overview');
})->name('process.overview');

Route::get('/dashboard/before-after', function () {
    return view('dashboard.process.before-after');
})->name('process.before');

Route::get('/dashboard/first-time', function () {
    return view('dashboard.process.first-time');
})->name('process.first');

Route::get('/dashboard/iron', function () {
    return view('dashboard.process.iron');
})->name('process.iron');

Route::get('/dashboard/health-benefits', function () {
    return view('dashboard.benefits.health');
})->name('benefits.health');

Route::get('/dashboard/blood-supply', function () {
    return view('dashboard.benefits.supply');
})->name('benefits.supply');

Route::get('/dashboard/community-impact', function () {
    return view('dashboard.benefits.impact');
})->name('benefits.impact');

Route::get('/dashboard/profile', [AuthController::class, 'profile'])
    ->name('account.profile');

// Show change password page
Route::get('/dashboard/change-password', function () {
    return view('dashboard.account.change-password');
})->name('account.password');

// Handle password update
Route::post('/dashboard/change-password', [AuthController::class, 'updatePassword'])
    ->name('account.password.update');


Route::get('/dashboard/edit-profile', function () {
    return view('dashboard.account.edit-profile');
})->name('account.edit');

Route::post('/dashboard/edit-profile', [AuthController::class, 'updateProfile'])
    ->name('account.update');



/*
|--------------------------------------------------------------------------
| Emergency
|--------------------------------------------------------------------------
*/
Route::get('/emergency/request', [EmergencyController::class, 'create']);
Route::post('/emergency/request', [EmergencyController::class, 'store']);

Route::get('/blood-banks', function () {
    return view('blood-banks');
});

Route::get('/emergency/bloodbanks', function () {
    return view('blood-banks');
});




/*
|--------------------------------------------------------------------------
| Extra Pages
|--------------------------------------------------------------------------
*/
Route::get('/donor-health', fn () => view('donor-health'));
Route::get('/emergency-info', fn () => view('emergency-info'));

Route::post('/newsletter/subscribe', [PageController::class, 'subscribeNewsletter'])
    ->name('newsletter.subscribe');

use App\Http\Controllers\AdminController;

Route::middleware('admin')->group(function () {

    // User management
    Route::get('/admin/users', [AdminController::class, 'users'])
        ->name('admin.users');

    Route::post('/admin/users/{id}/toggle', [AdminController::class, 'toggleUserStatus'])
        ->name('admin.users.toggle');

});

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout (both admin & donor)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/users', [AdminController::class, 'users'])
        ->name('admin.users');

    Route::post('/admin/users/{id}/toggle', [AdminController::class, 'toggleUserStatus'])
        ->name('admin.users.toggle');

    Route::get('/admin/appointments', [AdminController::class, 'appointments'])
        ->name('admin.appointments');

    Route::get('/admin/emergencies',
    [AdminController::class, 'emergencies']
)->name('admin.emergencies');

});

Route::post(
    '/dashboard/profile/photo',
    [AuthController::class, 'updateProfilePhoto']
)->name('account.photo.update');

use App\Http\Controllers\NewsletterController;

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->name('newsletter.subscribe');

    Route::get('/parallax', function () {
    return view('blood.parallax');
});

Route::patch(
    '/admin/appointments/{id}/complete',
    [AuthController::class, 'markCompleted']
)->name('admin.appointment.complete');

Route::get(
    '/dashboard/history',
    [AuthController::class, 'history']
)->name('dashboard.history');


Route::get('/emergency/request', [EmergencyController::class, 'create'])
    ->name('emergency.form');
Route::post('/emergency/request', [EmergencyController::class, 'requestBlood'])
    ->name('emergency.request');
    Route::get('/emergency/load-more', [EmergencyController::class, 'loadMore'])
    ->name('emergency.loadMore');

    use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

Route::get('/fix-donors', function () {

    $donors = DB::table('donors')->get();

    foreach ($donors as $d) {

        $geo = Http::withHeaders([
            'User-Agent' => 'BloodPortalApp'
        ])->get('https://nominatim.openstreetmap.org/search', [
            'q' => $d->location,
            'format' => 'json',
            'limit' => 1,
        ])->json();

        if (!empty($geo)) {
            DB::table('donors')->where('id', $d->id)->update([
                'latitude' => $geo[0]['lat'],
                'longitude' => $geo[0]['lon'],
            ]);
        }
    }

    return "Donors updated successfully!";
});