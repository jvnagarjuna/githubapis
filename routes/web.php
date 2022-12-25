<?php

use App\Http\Controllers\GitHubAPIController;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function () {
    return Redirect::route('get-all-github-repos');
});

// Route::get('get', 'DataController@getRequest');

Route::get('getAllGithubRepos', [GitHubAPIController::class, 'getAllGithubRepos'])->name('get-all-github-repos');
Route::get('createGithubRepo', [GitHubAPIController::class, 'createGithubRepo'])->name('create-github-repo');
Route::post('storeGithubRepo', [GitHubAPIController::class, 'storeGithubRepo'])->name('store-github-repo');
Route::get('deletingGithubRepo', [GitHubAPIController::class, 'deletingGithubRepo'])->name('deleting-github-repo');
Route::post('deleteGithubRepo', [GitHubAPIController::class, 'deleteGithubRepo'])->name('delete-github-repo');
