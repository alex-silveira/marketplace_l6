<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = session()->has('cart') ? session()->get('cart') : [];

        return view('cart', compact('cart'));
    }
    public function add(Request $request)
    {
        $product = $request->get('product');

            // Verifica se existe sessão para produtos
        if(session()->has('cart')){
            // Existindo atualiza o produto na sessão existente
            session()->push('cart', $product);
        }else{
            // Não existindo cria a sessão com o primeiro produto
            $products[] = $product;

            session()->put('cart', $products);
        }

        flash('Produto Adicionado no carrinho!')->success();

        return redirect()->route('product.single', ['slug' =>$product['slug']]);
    }

    public function remove($line)
    {
        if(!session()->get('cart')){
            return redirect()->route('cart.index');
        }
        
        $cart = session()->get('cart');
        
        unset($cart[$line]);
        
        session()->put('cart' , $cart);

        return redirect()->route('cart.index');
    }
}
