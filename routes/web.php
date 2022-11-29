<?php

use App\Http\Controllers\Tools;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'INDEX');


Route::group([
    'prefix' => 'tools/',
    'as' => 'tools.',
], function () {

    Route::group([
        'prefix' => 'slugify',
        'as' => 'slugify.'
    ], function () {
        Route::inertia('/', 'Tools/Slugify')->name('page');
        Route::post('/', Tools\SlugifyController::class)->name('handler');
    });
});
