<?php

use App\Http\Controllers\GitHubAPIController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('get', 'DataController@getRequest');

Route::get('getAllGithubRepos', [GitHubAPIController::class, 'getAllGithubRepos'])->name('get-all-github-repos');
Route::get('createGithubRepo', [GitHubAPIController::class, 'createGithubRepo'])->name('create-github-repo');
Route::post('storeGithubRepo', [GitHubAPIController::class, 'storeGithubRepo'])->name('store-github-repo');



