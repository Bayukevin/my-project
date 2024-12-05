<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KomentarController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/detail-project', function () {
    return view('detailProject');
});


Route::get('/', [ArtikelController::class, 'index'])->name('home');
Route::get('/add-project', [ArtikelController::class, 'create'])->name('addProject');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/project', [ArtikelController::class, 'index'])->name('projects');
Route::get('artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::post('/artikel/{id}/publish', [ArtikelController::class, 'publish'])->name('artikel.publish');
Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/blog', [ArtikelController::class, 'index'])->name('blog');



Route::post('/artikel/{artikel_id}/komentar', [KomentarController::class, 'store'])->name('komentar.store');
