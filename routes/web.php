<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::view('/', 'home')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::post('/check-email', function(Request $request){

    $request->validate([
        'email' => 'required|email'
    ]);

    return response()->json([
        'exists' => User::where('email', $request->email)->exists()
    ]);

})->name('check.email');

require __DIR__.'/settings.php';
