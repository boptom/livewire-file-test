<?php

use App\Livewire\UploadPhoto;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

it('renders successfully fails', function () {
    Storage::fake();

    $file = UploadedFile::fake()->image('avatar.png');

    Livewire::test(UploadPhoto::class)
        ->set('photo', $file)
        ->set('name', 'uploaded-avatar.png')
        ->call('save');

    Storage::disk()->assertExists('uploaded-avatar.png');
});

it('renders successfully passes', function () {
    Storage::fake();

    $file = UploadedFile::fake()->image('avatar.png');

    Livewire::test(UploadPhoto::class)
        ->set('photo', $file)
        ->set('name', 'uploaded-avatar.png')
        ->call('save');

    Storage::disk('tmp-for-tests')->assertExists('uploaded-avatar.png');
});
