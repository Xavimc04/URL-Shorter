<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\URLController; 

Route::get('/', function () {
    return view('main');
});

Route::post('/routes/new', [URLController::class, 'register'])->name('register'); 

Route::get('/{id}', function($id) {
    $url = new URLController; 
    return $url->redirectToUrl($id); 
}); 
