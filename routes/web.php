<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LanguageController;

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
//Route::resource('Student',Controllers\sController::class);
//Route::get('/create', [Controllers\sController::class, 'create'])->name('Student.Create');
//    Route::post('/create', [Controllers\sController::class, 'create'])->name('Student.Create');


Route::prefix('/Student')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('Student.Index');
    Route::get('/Add', [StudentController::class, 'add'])->name('Student.Add');
    Route::post('/Add', [StudentController::class, 'add'])->name('Student.Add');
    Route::get('/Edit/{id}', [StudentController::class, 'edit'])->name('Student.Edit');
    Route::post('/Edit/{id}', [StudentController::class, 'edit'])->name('Student.Edit');
    Route::get('/Delete/{id}', [StudentController::class, 'delete'])->name('Student.Delete');
    Route::post('/Delete/{id}', [StudentController::class, 'delete'])->name('Student.Delete');
    Route::get('/search', [StudentController::class, 'search'])->name('search');
    Route::get('/search_all', [StudentController::class, 'search_all'])->name('searchAll');
    Route::post('/search', [StudentController::class, 'search'])->name('search');
    Route::post('/search_all', [StudentController::class, 'search_all'])->name('searchAll');

});

Route::post( uri: '/language-switch', action: [LanguageController::class, 'languageSwitch'])->name( name: 'language.switch');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
