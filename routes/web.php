<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/",[HomeController::class,"index"])->name('/');

Route::get("/redirects",[HomeController::class,"redirects"])->name('redirects');

Route::get("/users",[AdminController::class,"user"])->name('users');

Route::get("/foodMenu",[AdminController::class,"foodMenu"])->name('foodMenu');

Route::post("/uploadItems",[AdminController::class,"uploadItems"])->name('uploadItems');

Route::get("/deleteUser/{id}",[AdminController::class,"deleteUser"])->name('deleteUser');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
