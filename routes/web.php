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

    $role = new Role(['name'=>'Subscriber']);

    $user->roles()->save($role);

});

Route::get('read', function(){

    $user = User::findOrFail(1);

//    dd($user->roles);

    foreach ($user->roles as $role){

//        dd($role);
        echo $role->name;

    }

});

Route::get('/update', function(){

    $user = User::findOrFail(1);

    if($user->has('roles')){

        foreach ($user->roles as $role){

            if($role->name == 'Admin'){

                $role->name = "moderator";

                $role->save();

            }

        }

    }

});

Route::get('/delete', function(){

    $user = User::findOrFail(1);
//
//    $user->roles()->delete();

    foreach ($user->roles as $role){

        $role->whereId(3)->delete();

    }

});

// Attaches a role to a user

Route::get('/attach', function(){

    $user = User::findOrFail(1);

    $user->roles()->attach(2);

});

//Detaches a role from a user

Route::get('/detach', function(){

    $user = User::findOrFail(1);

    $user->roles()->detach(2);

});

Route::get('/sync', function(){

    $user = User::findOrFail(1);

    $user->roles()->sync([2,4]);

});
