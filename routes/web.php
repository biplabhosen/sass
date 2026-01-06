<?php

use App\Http\Controllers\customerController;
use App\Http\Controllers\UserController;
use App\Mail\UserNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/customer', function () {
//     return view('customers');
// });
// Route::get('/customers/{name}/{id}', function ($name,$id) {
//     return "His id is $id and name is $name";
// });

Route::get('/customer', [customerController::class, "index"]);
Route::get('/customer/create', [customerController::class, "create"]);
Route::post('/customer/save', [customerController::class, "save"]);
Route::get('/customer/find/{id} ', [customerController::class, "find"]);
Route::get('/customer/edit/{id}', [customerController::class, "edit"]);
Route::post('/customer/update/{id}', [customerController::class, "update"]);
Route::delete('/customer/delete/{id} ', [customerController::class, "delete"]);

Route::prefix("system")->group(function(){
    Route::resource("user", UserController::class);
});

Route::get('sendmail', function () {
    Mail::to("biplobhosen214@gmail.com")->send(new UserNotification);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
