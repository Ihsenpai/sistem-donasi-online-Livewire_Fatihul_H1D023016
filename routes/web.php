<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Kategori\Index as KategoriIndex;
use App\Livewire\Kategori\Form as KategoriForm;
use App\Livewire\Kampanye\Index as KampanyeIndex;
use App\Livewire\Kampanye\Form as KampanyeForm;
use App\Livewire\Kampanye\Progress as KampanyeProgress;
use App\Livewire\Donasi\Index as DonasiIndex;
use App\Livewire\Donasi\Form as DonasiForm;
use App\Livewire\Donatur\Index as DonaturIndex;
use App\Livewire\Donatur\History as DonaturHistory;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Kategori routes
Route::get('/kategori', KategoriIndex::class)
    ->middleware(['auth'])
    ->name('kategori.index');
Route::get('/kategori/create', KategoriForm::class)
    ->middleware(['auth'])
    ->name('kategori.create');
Route::get('/kategori/{kategori}/edit', KategoriForm::class)
    ->middleware(['auth'])
    ->name('kategori.edit');

// Kampanye routes
Route::get('/kampanye', KampanyeIndex::class)
    ->middleware(['auth'])
    ->name('kampanye.index');
Route::get('/kampanye/create', KampanyeForm::class)
    ->middleware(['auth'])
    ->name('kampanye.create');
Route::get('/kampanye/{kampanye}/edit', KampanyeForm::class)
    ->middleware(['auth'])
    ->name('kampanye.edit');
Route::get('/kampanye/{kampanye}/progress', KampanyeProgress::class)
    ->middleware(['auth'])
    ->name('kampanye.progress');

// Donasi routes
Route::get('/donasi', DonasiIndex::class)
    ->middleware(['auth'])
    ->name('donasi.index');
Route::get('/donasi/create', DonasiForm::class)
    ->middleware(['auth'])
    ->name('donasi.create');
Route::get('/donasi/{donasi}/edit', DonasiForm::class)
    ->middleware(['auth'])
    ->name('donasi.edit');

// Donatur routes
Route::get('/donatur', DonaturIndex::class)
    ->middleware(['auth'])
    ->name('donatur.index');
Route::get('/donatur/{donatur}/history', DonaturHistory::class)
    ->middleware(['auth'])
    ->name('donatur.history');

require __DIR__.'/auth.php';
