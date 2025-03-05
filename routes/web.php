<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\App;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [Login::class, 'index'])->name('/login');
Route::get('/register', [Register::class, 'index'])->name('/register');
Route::post('/actregister', [Register::class, 'actregister'])->name('/actregister');
Route::post('/actlogin', [Login::class, 'actlogin'])->name('/actlogin');
Route::get('/masuk', [App::class, 'index'])->name('/masuk');
Route::post('/addantrian', [App::class, 'add_antrian'])->name('/addantrian');
Route::get('/addantrian', [App::class, 'add_antrian'])->name('/addantrian');

Route::get('/admin', [Admin::class, 'index'])->name('/admin');
Route::get('/admin/poli', [Admin::class, 'poli'])->name('admin/poli');
Route::post('/admin/poli', [Admin::class, 'addpoli'])->name('admin/poli');
Route::post('/admin/editpoli', [Admin::class, 'editpoli'])->name('admin/editpoli');
Route::delete('/admin/hapuspoli/{id}', [Admin::class, 'hapuspoli'])->name('admin/hapuspoli');


Route::get('/admin/loket', [Admin::class, 'loket'])->name('admin/loket');
Route::post('/admin/loket', [Admin::class, 'addloket'])->name('admin/addloket');
Route::post('/admin/editloket', [Admin::class, 'editloket'])->name('admin/editloket');
Route::delete('/admin/hapusloket/{id}', [Admin::class, 'hapusloket'])->name('admin/hapusloket');

Route::get('/admin/antrian', [Admin::class, 'antrian'])->name('admin/antrian');
Route::get('/admin/akunloket', [Admin::class, 'akunloket'])->name('admin/akunloket');
Route::post('/admin/akunloket', [Admin::class, 'addakunloket'])->name('admin/addakunloket');
Route::post('/admin/editakunloket', [Admin::class, 'editakunloket'])->name('admin/editakunloket');
Route::delete('/admin/hapusakunloket/{id}', [Admin::class, 'hapusakunloket'])->name('admin/hapusakunloket');
