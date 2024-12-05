<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;

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

// Route::get('/project', function () {
//     return view('project');
// });

Route::get('/', [ArtikelController::class, 'index'])->name('home');
Route::get('/add-project', [ArtikelController::class, 'create'])->name('addProject');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/project', [ArtikelController::class, 'index'])->name('projects');
