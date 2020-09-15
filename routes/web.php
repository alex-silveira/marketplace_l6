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

    // pegar a loja de um usuário
    $user = \App\User::find(4);
    //return $user->store; // retonar o objeto único (Store) se for Collection de Dados(Objetos)
    //return dd($user->store()->count());

    //Pegar os produtos de uma loja
    $loja = \App\Store::find(4);    
    //return $loja->products->count();
    //return $loja->products()->where('id', 4)->get();

    //Pegar as lojas de uma categoria
    //$categoria = \App\Category::find(1);
    //$categoria->products;

    //Criar uma loja para um usuário
    // $user = \App\User::find(10);
    // $store = $user->store()->create(
    //     [
    //         'name' => 'Loja Teste',
    //         'description' => 'Loja Teste de informática',
    //         'mobile_phone' => 'XX-XXXXX-XXXX',
    //         'phone' => 'XX-XXXXX-XXXX',
    //         'slug' => 'loja-teste',
    //     ]
    // );    

    //Criar um produto para uma loja
    // $store = \App\Store::find(41);
    // $product = $store->products()->create(
    //     [
    //         'name' => 'Notebook Dell',
    //         'description' => 'CORE I5 10GB',
    //         'body' => 'Qualquer coisa...',
    //         'price' => 2999.90,
    //         'slug' => 'notebook-dell',
    //     ]
    // );
    
    //Criar uma categoria
    // \App\Category::create(
    //     [
    //         'name' => 'Games',
    //         'slug' => 'games',
    //     ]
    // );    

    // \App\Category::create(
    //     [
    //         'name' => 'Notebooks',
    //         'slug' => 'notebooks',
    //     ]
    // );   
    // return \App\Category::all();

    //Adicionar um produto para uma categoria e vice-versa

    // $product = \App\Product::find(1);
    // //dd($product->categories()->attach([3])); //add
    // //dd($product->categories()->detach([3])); //remove
    // dd($product->categories()->sync([3])); //Se não existe adiciona, se existe exclui

    // $product = \App\Product::find(1);
    // return $product->categories;
    return \App\User::all();
});

//Route::get
//Route::post
//Route::put - atualização
//Route::patch - atualização
//Route::delete
//Route::options - retorna os cabeçalhos que a rota responde



Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
    // Route::prefix('stores')->name('stores.')->group(function(){
    //     Route::get('/', 'StoreController@index')->name('index');
    //     Route::get('/create', 'StoreController@create')->name('create');
    //     Route::post('/store', 'StoreController@store')->name('store');
    //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
    //     Route::post('/update/{store}', 'StoreController@update')->name('update');
    //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
    // });

    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
