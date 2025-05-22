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

Route::get('/chefs', [HomeController::class, 'chefs'])->name('chefs');

Route::get("/users",[AdminController::class,"user"])->name('users');

Route::get("/foodMenu",[AdminController::class,"foodMenu"])->name('foodMenu');

Route::post("/uploadItems",[AdminController::class,"uploadItems"])->name('uploadItems');

Route::get("/deleteUser/{id}",[AdminController::class,"deleteUser"])->name('deleteUser');

Route::get("/deleteMenu/{id}",[AdminController::class,"deleteMenu"])->name('deleteMenu');

Route::get("/updateMenu/{id}",[AdminController::class,"updateMenu"])->name('updateMenu');

Route::post("/update/{id}",[AdminController::class,"update"])->name('update');

Route::post("/reservation",[AdminController::class,"reservation"])->name('reservation');

Route::get("/viewReservation",[AdminController::class,"viewReservation"])->name('viewReservation');

Route::get("/viewChef",[AdminController::class,"viewChef"])->name('viewChef');

Route::post("/uploadChefInfo",[AdminController::class,"uploadChefInfo"])->name(name: 'uploadChefInfo');

Route::get("/deleteChef/{id}",[AdminController::class,"deleteChef"])->name('deleteChef');

Route::get("/updateChef/{id}",[AdminController::class,"updateChef"])->name('updateChef');

Route::post("/updateChefInfo/{id}",[AdminController::class,"updateChefInfo"])->name('updateChefInfo');

Route::post('/addcart/{id}', [HomeController::class, 'addcart'])->name('addcart');

Route::get('/showcart/{id}', [HomeController::class, 'showcart'])->name('showcart');

Route::get('/remove/{id}', [HomeController::class, 'remove'])->name('remove');

Route::post('/orderConfirm', [HomeController::class, 'orderConfirm'])->name('orderConfirm');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';