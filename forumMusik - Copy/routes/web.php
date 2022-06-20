<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ForumController;
use App\Http\Controllers\MusicController;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PlaylistAdminController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\TopicController;
use App\Models\PlaylistAdmin;
use App\Models\User;
use App\Models\Reply;
use App\Models\Genre;
use App\Http\Controllers\ShareSocialController;
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

//Index Forum
Route::get('/', [ForumController::class, 'index']);


//Rute untuk About
Route::resource('about', 'App\Http\Controllers\AboutController');
Route::get('about/create', [AboutController::class, 'create'])->name('about.create');
Route::post('about/create', [AboutController::class, 'store'])->name('about.store');
Route::get('about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
Route::put('about/{id}/edit', [AboutController::class, 'update'])->name('about.store');


//Rute untuk Playlist ~

Route::resource(
    'playlist',
    'App\Http\Controllers\PlaylistController'
);


//Rute untuk Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::delete('users/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('users/{user}/view-profile', [UsersController::class, 'showUser'])->name('users.showUser');

    Route::get('playlist/from-admin/create', [PlaylistAdminController::class, 'create'])->name('playlistadmin.create');
    Route::get('playlist/from-admin', [PlaylistController::class, 'show'])->name('playlist.show');
    Route::post('playlist/from-admin', [PlaylistAdminController::class, 'store'])->name('playlistadmin.store');
    Route::delete('playlist/from-admin/{id}/delete', [PlaylistAdminController::class, 'destroy'])->name('playlistadmin.delete');
    Route::delete('playlist/{id}/delete', [PlaylistController::class, 'destroy'])->name('playlist.delete');
});


//Rute untuk Change Password
Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password.index');
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');


//Rute untuk Lupa Password
Route::get('/forgotpw', function () {
    return view('auth.forgotpassword');
});
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


//Rute untuk Halaman Topic
Route::resource('topic', 'App\Http\Controllers\TopicController');
Route::get('view-genre/{slug}', [TopicController::class, 'viewgenre'])->name('topic.view-genre');
Route::get('view-user/{id}', [TopicController::class, 'viewuser'])->name('topic.view-user');
Route::get('oldest', [TopicController::class, 'oldest'])->name('topic.oldest');
Route::get('latest', [TopicController::class, 'latest'])->name('topic.latest');
Route::get('mostreplies', [TopicController::class, 'mostreply'])->name('topic.mostreplies');
Route::post('topic/upload', [TopicController::class, 'upload'])->name('topic.upload');
Route::post('topic/{topic}/pin', [TopicController::class, 'pin'])->name('topic.pin');

//Rute untuk User Profile
Route::get('users/profile', [UsersController::class, 'show'])->name('users.show');
Route::get('users/edit-profile', [UsersController::class, 'edit'])->name('users.edit-profile');
Route::put('users/update-profile', [UsersController::class, 'update'])->name('users.update-profile');
Route::delete('users/{user}/deleteuser', [UsersController::class, 'destroyUser'])->name('users.destroyUser');


//Rute untuk Reply-an
Route::resource('topic/{topic}/replies', 'App\Http\Controllers\RepliesController');
Route::get('topic/{topic}/replies/{reply}/edit', [RepliesController::class, 'edit'])->name('replies.edit');
Route::delete('topic/{topic}/replies/{reply}', [RepliesController::class, 'destroy'])->name('replies.destroy');
Route::put('topic/{topic}/replies/{reply}', [RepliesController::class, 'update'])->name('replies.update');
//Rute untuk segala auth : Login/Register semacamnya
Auth::routes();


//Rute untuk pertama masuk website
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/homepage', [App\Http\Controllers\HomeController::class, 'home'])->name('homepage');


//Rute untuk Logout dari akun
Route::get('/logout', [App\Http\Controllers\UsersController::class, 'logout'])->name('logout');

Route::get('/share-social', [ShareSocialController::class, 'shareSocial']);
