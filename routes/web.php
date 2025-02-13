<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthCallbackController;
use App\Http\Controllers\AuthRedirectController;



Route::get('/', \App\Livewire\Pages\Home::class)->name('home');
Route::get('/berita', \App\Livewire\Pages\Berita::class)->name('berita');
Route::get('/Article/{article:slug}', \App\Livewire\Pages\Article::class)->name('article.show');
Route::get('/toko', \App\Livewire\Pages\Toko::class)->name('toko');
Route::get('/Products/{product:slug}', \App\Livewire\Pages\Product::class)->name('product.show');
Route::get('/page:{slug}', App\Livewire\Pages\Page::class)->name('page.show');
Route::get('/categories/{category:slug}', \App\Livewire\Pages\Category::class)->name('category.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'), //Jangan Typo YA GES YAKK
    'verified',
])->group(function () {
    //
});

Route::middleware('guest')->group(function () {
    Route::get('/auth/redirect/{service}', AuthRedirectController::class)->name('auth.redirect');
    Route::get('/auth/callback/{service}', [AuthCallbackController::class, 'handle'])->name('auth.callback');
});
