<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;
use Laravel\Socialite\Socialite;

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

Route::get('/auth/google', function(){
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('/auth/google/callback', function(){
   /** @var \Laravel\Socialite\Two\AbstractProvider $driver */
    $driver = Socialite::driver('google');
    $googleUser = $driver->stateless()->user();

    $user = User::updateOrCreate([
        'email' => $googleUser->getEmail(),
    ],[
        'name' => $googleUser->getName(),
        'google_id' => $googleUser->getId(),
        'provider' => 'google',
        'email_verified_at' => now(),
    ]);

    Auth::login($user);
    return redirect()->intended(('/dashboard'));
});

require __DIR__.'/settings.php';
