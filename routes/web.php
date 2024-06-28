<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocController;
use App\Models\Matakuliah;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Course
    // Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    // Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    // Route::get('/course/edit', [CourseController::class, 'edit'])->name('course.edit');
    Route::resource('/course', CourseController::class);

    // Lecture
    Route::resource('/lecture', LectureController::class);


    Route::resource('/documentation', DocController::class);
    // User
    Route::resource('/user', UserController::class);
});

Route::middleware('admin')->group(function(){
    // Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    // Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    // Route::get('/course/edit', [CourseController::class, 'edit'])->name('course.edit');

    Route::resource('/course', CourseController::class);

    // Lecture
    Route::resource('/lecture', LectureController::class);

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');

});

require __DIR__ . '/auth.php';
