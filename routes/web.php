<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;

Route::get('/',[HomeController::class,'index'])->name('inicio');
Route::get('/contactanos',[ContactController::class,'index'])->name('contactanos');
Route::get('/galeria',[GalleryController::class,'index'])->name('galeria');
Route::get('/nosotros',[AboutusController::class,'index'])->name('nosotros');

Route::resource('/noticias',BlogController::class);

Route::resource('proyectos',ProjectController::class);
Route::get('/brochure',[ProjectController::class,'brochure'])->name('brochure');

Route::get('/complaintsbook',[PageController::class,'complaintsbook'])->name('complaintsbook');
Route::get('/terminos-y-condiocnes',[PageController::class,'termsandconditions'])->name('termsandconditions');
Route::get('/politicas-de-privacidad',[PageController::class,'privacypolicies'])->name('privacypolicies');


