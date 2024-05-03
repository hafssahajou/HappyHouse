<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('/admin/statistiques' , function()
{
    return view('admin.statistiques');
});

Route::get('/admin/category' , function()
{
    return view('admin.categories');
});


Route::get('/admin/immobilier' , function()
{
    return view('admin.immobilier');
});

Route::get('/admin/users' , function()
{
    return view('admin.users');
});

Route::get('/admin/test' , function()
{
    return view('admin.test');
});

Route::get('/Auth/login' , function()
{
    return view('Auth.login');
});

Route::get('/client_Portfolio' , function()
{
    return view('client.Portfolio');
});


