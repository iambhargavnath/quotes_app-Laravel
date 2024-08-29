<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuoteController;

use App\Http\Middleware\CorsMiddleware;
use App\Http\Middleware\ApiCsrfMiddleware;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([CorsMiddleware::class, ApiCsrfMiddleware::class])
    ->group(function () {
        Route::get('/api/quotes', [QuoteController::class, 'index']);
        Route::post('/api/save', [QuoteController::class, 'store']);
        Route::get('/api/quote/{id}', [QuoteController::class, 'show']);
        Route::put('/api/update/{id}', [QuoteController::class, 'update']);
        Route::delete('/api/delete/{id}', [QuoteController::class, 'destroy']);
    });

