<?php

use App\Livewire\UploadPhoto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload-photo', UploadPhoto::class);
