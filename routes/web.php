<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){

    echo "Test test test test test test";

});

Route::get('/create', function(){

    $user = User::find(1);

    $role = new Role(['name'=>'Admin']);

    $user->roles()->save($role);

});
