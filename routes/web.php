<?php

use App\Livewire\Home;
use App\Models\CategoryProducts;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('landing_page');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
