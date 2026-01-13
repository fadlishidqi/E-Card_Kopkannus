<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('user.login');
});

Route::resource('members', MemberController::class);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login.form');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/card/{id}', [UserController::class, 'showCard'])->name('user.card');

Route::middleware('auth:member')->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('user.home');
});

Route::get('/test1', function() {
    try {
        $details = [
            'to' => 'fadlishidqifirdaus@gmail.com',
            'subject' => 'Test Email',
            'body' => 'This is a test email'
        ];
        
        Mail::raw($details['body'], function($message) use ($details) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                   ->to($details['to'])
                   ->subject($details['subject']);
        });
        
        return "Email sent successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage() . "\nTrace: " . $e->getTraceAsString();
    }
});

Route::get('/card/{id}', [UserController::class, 'showCard'])->name('user.card');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

