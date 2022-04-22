<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DislikesController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\PublicProfilesController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Start
Route::get('/', [PageController::class, 'welcome']);

//Registration
Route::get('age', [RegistrationController::class, 'confirmAge']);
Route::post('validation', [RegistrationController::class, 'validateNewUser']);
Route::post('create', [RegistrationController::class, 'storeData']);

//Login
Route::post('login', [LoginController::class, 'login']);
//Logout
Route::get('logout', [LogoutController::class, 'logout']);

//Profiles
Route::get('home', [PublicProfilesController::class, 'index']);
Route::get('show/{userId}', [PublicProfilesController::class, 'show']);
Route::get('edit/{sessionId}', [PublicProfilesController::class, 'edit']);
Route::post('update', [PublicProfilesController::class, 'update']);

//Preferences
Route::get('preferences', [PreferencesController::class, 'preferences']);
Route::post('preferences', [PreferencesController::class, 'setPreferences']);

//Likes
Route::post('like/{likedUserId}', [LikesController::class, 'addLiked']);

//Dislikes
Route::post('dislike/{dislikedUserId}', [DislikesController::class, 'addDisliked']);

//Matches
Route::get('matches', [MatchesController::class, 'getMatches']);

//Album
Route::post('/album/create', [AlbumController::class, 'storeAlbumImages']);

//User profile
Route::get('myprofile', [PublicProfilesController::class, 'show']);



