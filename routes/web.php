<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', [Controller::class, "index"]);

Route::get('/jenis', [Controller::class, "jenis"])->middleware(CekLogin::class);
Route::get('/menu', [Controller::class, "menu"])->middleware(CekLogin::class);
Route::get('/cart', [Controller::class, "cart"])->middleware(CekLogin::class);
Route::get('/addtocart/{id}', [Controller::class, "addtocart"])->middleware(CekLogin::class);
Route::get('/removefromcart/{index}', [Controller::class, "removefromcart"])->middleware(CekLogin::class);


Route::get('/login', [Controller::class, "login"]);
Route::get('/register', [Controller::class, "register"]);
Route::get('/logout', [Controller::class, "logout"]);

Route::post('/login', [Controller::class, "tekanlogin"]);
Route::post('/register', [Controller::class, "tekanregister"]);

Route::post('/menu', [Controller::class, "tekanAddMenu"]);
Route::post('/jenis', [Controller::class, "tekanAddJenis"]);

Route::post('/cart', [Controller::class, "tekanCheckOut"]);

Route::get('/laporan', [Controller::class, "laporan"])->middleware(CekLogin::class);
Route::get('/diproses', [Controller::class, "diproses"]);
Route::get('/dikirim', [Controller::class, "dikirim"]);
Route::get('/ditolak', [Controller::class, "ditolak"]);
Route::get('/diterima', [Controller::class, "diterima"]);
