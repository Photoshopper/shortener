<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\API\LinkController as ApiLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('shortener', function () {
    return view('app');
});

Route::get('/{base}', [LinkController::class, 'redirect'])->name('shortlink');

Route::post('links', [ApiLinkController::class, 'add']);
