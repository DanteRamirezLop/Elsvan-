<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;

Route::get('/',[HomeController::class,'index'])->name('inicio');
Route::get('/galeria',[GalleryController::class,'index'])->name('galeria');
Route::get('/nosotros',[AboutusController::class,'index'])->name('nosotros');
Route::get('/contactanos',[ContactController::class,'index'])->name('contactanos');
Route::post('/contactanos',[ContactController::class,'send'])->name('contactanos.send');
Route::get('/cotizar/{project?}',[ContactController::class,'quote'])->name('quote');
Route::post('/cotizar',[ContactController::class,'sendQuote'])->name('quote.send');
Route::resource('noticias',ArticleController::class);
Route::resource('proyectos',ProjectController::class)->parameters(['proyectos' => 'project']);
Route::get('/brochure',[ProjectController::class,'brochure'])->name('brochure');
Route::get('/complaintsbook',[PageController::class,'complaintsbook'])->name('complaintsbook');
Route::post('/reclamos',[PageController::class,'reclamos']);
Route::get('/terminos-y-condiciones',[PageController::class,'termsandconditions'])->name('termsandconditions');
Route::get('/politicas-de-privacidad',[PageController::class,'privacypolicies'])->name('privacypolicies');


