<?php

use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'HomePage', [
    'tools' => config('tools'),
]);

Route::group([
    'prefix' => 'tools/',
    'as' => 'tools.',
], function () {
    foreach (config('tools') as $tool => $data) {
        Route::inertia('/' . $tool, $data['component'])->name($tool);
    }
    Route::post('/{tool}', ToolController::class)->name('handler');
});
