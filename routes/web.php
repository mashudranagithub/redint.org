<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StudyAreasController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SettingsController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UiController::class, 'homepage'])->name('homepage');
Route::get('/gallery', [UiController::class, 'gallery'])->name('gallery');
Route::get('/background', [UiController::class, 'background'])->name('background');
Route::get('/vision-mission', [UiController::class, 'visionMission'])->name('visionMission');
Route::get('/network-partners', [UiController::class, 'networkPartners'])->name('networkPartners');

Route::get('/professionals', [UiController::class, 'professionals'])->name('professionals');
Route::get('/advisors', [UiController::class, 'advisors'])->name('advisors');
Route::get('/management', [UiController::class, 'management'])->name('management');

Route::get('/publications', [UiController::class, 'publications'])->name('publications');
Route::get('/presentations', [UiController::class, 'presentations'])->name('presentations');

Route::get('/consultancy', [UiController::class, 'consultancy'])->name('consultancy');
Route::get('/social', [UiController::class, 'social'])->name('social');
Route::get('/technical', [UiController::class, 'technical'])->name('technical');

Route::get('/contact', [UiController::class, 'contact'])->name('contact');

Route::get('/researches', [UiController::class, 'researches'])->name('researches');
Route::get('/single-research/{id}', [UiController::class, 'single_research'])->name('single-research');

Route::get('/events', [UiController::class, 'events'])->name('events');
Route::get('/workshops', [UiController::class, 'workshops'])->name('workshops');
Route::get('/awards', [UiController::class, 'awards'])->name('awards');

Route::get('/single-event/{id}', [UiController::class, 'single_event'])->name('single-event');

Route::get('/studies', [UiController::class, 'studies'])->name('studies');
Route::get('/study-area/{id}', [UiController::class, 'studyArea'])->name('studyArea');
Route::get('/study/{id}', [UiController::class, 'study'])->name('study');

// Auth::routes();

Auth::routes(['verfiy' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['verified']);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::group(['middleware' => ['auth', 'verified']], function() {
	Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

	// Photo Routes Start Here
	Route::get('all-photos', [GalleryController::class, 'index'])->name('allPhotos');
	Route::get('photo/create', [GalleryController::class, 'create'])->name('createPhoto');
	Route::post('photo/create', [GalleryController::class, 'store'])->name('storePhoto');
	Route::get('photo/show/{id}', [GalleryController::class, 'show'])->name('showPhoto');
	Route::get('photo/edit/{id}', [GalleryController::class, 'edit'])->name('editPhoto');
	Route::put('photo/update/{id}', [GalleryController::class, 'update'])->name('updatePhoto');
	Route::delete('photo/delete/{id}', [GalleryController::class, 'destroy'])->name('deletePhoto');

	// Study Area Routes Start Here
	Route::get('all-study-area', [StudyAreasController::class, 'index'])->name('all-study-area');
	Route::get('study-area-create', [StudyAreasController::class, 'create'])->name('create-study-area');
	Route::post('study-area-create', [StudyAreasController::class, 'store'])->name('store-study-area');
	Route::get('study-area-edit/{id}', [StudyAreasController::class, 'edit'])->name('edit-study-area');
	Route::put('study-area-update/{id}', [StudyAreasController::class, 'update'])->name('update-study-area');
	Route::delete('study-area-delete/{id}', [StudyAreasController::class, 'destroy'])->name('delete-study-area');


	// Study Routes Start Here
	Route::get('all-study', [StudyController::class, 'index'])->name('all-study');
	Route::get('study-create', [StudyController::class, 'create'])->name('create-study');
	Route::post('study-create', [StudyController::class, 'store'])->name('store-study');
	Route::get('study-show/{id}', [StudyController::class, 'show'])->name('show-study');
	Route::get('study-edit/{id}', [StudyController::class, 'edit'])->name('edit-study');
	Route::put('study-update/{id}', [StudyController::class, 'update'])->name('update-study');
	Route::delete('study-delete/{id}', [StudyController::class, 'destroy'])->name('delete-study');


	// Publications Routes Start Here
	Route::get('all-publications', [PublicationController::class, 'index'])->name('all-publications');
	Route::get('publications-create', [PublicationController::class, 'create'])->name('create-publication');
	Route::post('publications-create', [PublicationController::class, 'store'])->name('store-publication');
	Route::get('publications-edit/{id}', [PublicationController::class, 'edit'])->name('edit-publication');
	Route::put('publications-update/{id}', [PublicationController::class, 'update'])->name('update-publication');
	Route::delete('publications-delete/{id}', [PublicationController::class, 'destroy'])->name('delete-publication');

	// Presentations Routes Start Here
	Route::get('all-presentations', [PresentationController::class, 'index'])->name('all-presentations');
	Route::get('presentation-create', [PresentationController::class, 'create'])->name('create-presentation');
	Route::post('presentation-create', [PresentationController::class, 'store'])->name('store-presentation');
	Route::get('presentation-show/{id}', [PresentationController::class, 'show'])->name('show-presentation');
	Route::get('presentation-edit/{id}', [PresentationController::class, 'edit'])->name('edit-presentation');
	Route::put('presentation-update/{id}', [PresentationController::class, 'update'])->name('update-presentation');
	Route::delete('presentation-delete/{id}', [PresentationController::class, 'destroy'])->name('delete-presentation');


	// Research Routes Start Here
	Route::get('all-research', [ResearchController::class, 'index'])->name('all-research');
	Route::get('research/create', [ResearchController::class, 'create'])->name('createResearch');
	Route::post('research/create', [ResearchController::class, 'store'])->name('storeResearch');
	Route::get('research/show/{id}', [ResearchController::class, 'show'])->name('showResearch');
	Route::get('research/edit/{id}', [ResearchController::class, 'edit'])->name('editResearch');
	Route::put('research/update/{id}', [ResearchController::class, 'update'])->name('updateResearch');
	Route::delete('research/delete/{id}', [ResearchController::class, 'destroy'])->name('deleteResearch');


	// Events Routes Start Here
	Route::get('all-events', [EventController::class, 'index'])->name('all-events');
	Route::get('event/create', [EventController::class, 'create'])->name('createEvent');
	Route::post('event/create', [EventController::class, 'store'])->name('storeEvent');
	Route::get('event/show/{id}', [EventController::class, 'show'])->name('showEvent');
	Route::get('event/edit/{id}', [EventController::class, 'edit'])->name('editEvent');
	Route::put('event/update/{id}', [EventController::class, 'update'])->name('updateEvent');
	Route::delete('event/delete/{id}', [EventController::class, 'destroy'])->name('deleteEvent');


	// Events Routes Start Here
	Route::get('all-members', [MemberController::class, 'index'])->name('all-members');
	Route::get('member/create', [MemberController::class, 'create'])->name('create-member');
	Route::post('member/create', [MemberController::class, 'store'])->name('store-member');
	Route::get('member/show/{id}', [MemberController::class, 'show'])->name('show-member');
	Route::get('member/edit/{id}', [MemberController::class, 'edit'])->name('edit-member');
	Route::put('member/update/{id}', [MemberController::class, 'update'])->name('update-member');
	Route::delete('member/delete/{id}', [MemberController::class, 'destroy'])->name('delete-member');


	// Posts Routes Start Here
	Route::get('all-posts', [PostController::class, 'index'])->name('all-posts');
	Route::get('post/create', [PostController::class, 'create'])->name('create-post');
	Route::post('post/create', [PostController::class, 'store'])->name('store-post');
	Route::get('post/show/{id}', [PostController::class, 'show'])->name('show-post');
	Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('edit-post');
	Route::put('post/update/{id}', [PostController::class, 'update'])->name('update-post');
	Route::delete('post/delete/{id}', [PostController::class, 'destroy'])->name('delete-post');


	// Partners Routes Start Here
	Route::get('all-partners', [PartnerController::class, 'index'])->name('all-partners');
	Route::get('partner/create', [PartnerController::class, 'create'])->name('create-partner');
	Route::post('partner/create', [PartnerController::class, 'store'])->name('store-partner');
	Route::get('partner/edit/{id}', [PartnerController::class, 'edit'])->name('edit-partner');
	Route::put('partner/update/{id}', [PartnerController::class, 'update'])->name('update-partner');
	Route::delete('partner/delete/{id}', [PartnerController::class, 'destroy'])->name('delete-partner');


	// Settings Routes Start Here
	Route::get('settings', [SettingsController::class, 'edit'])->name('settings');
	Route::put('settings/update', [SettingsController::class, 'update'])->name('update-settings');


});
