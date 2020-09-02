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

Route::get('/', function () {
    $helloWorld = 'Hello World';
    //return view('welcome', ['helloWorld' => $helloWorld]);
    return view('welcome', compact('helloWorld'));
});

Route::get('/model', function(){
    //$products = \App\Product::all(); //select * from products

    //$user = new \App\User();
    //$user = \App\User::find(1);
    //$user->name = 'Usuário Teste editado';

    //$user->save();

    //\App\User::all(); - retorna todos os usuários
    //\App\User::find(3); - retorna o usuário com base no id
    //\App\User::where('name', 'Dusty Rempel')->get(); - select * from users where name = 'Dusty Rempel'
    //\App\User::where('name', 'Dusty Rempel')->first(); - primeiro resultado do select
    //\App\User::paginate(10); - paginar dados
    //return $products;

    // Mass assignment - Atribuição em massa

    // $user = \App\User::create(
    //     [
    //         'name' => 'Alex Araújo ',
    //         'email' => 'alex2@email.com',
    //         'password' => bcrypt('12345'),
    //     ]
    // );

    //Mass Update
    // $user = \App\User::find(42);
    // $user->update(
    //     [
    //         'name' => 'Atualizando com Mass Update'
    //     ]
    // ); // true / false
    
    // dd($user);

    return \App\User::all();
});