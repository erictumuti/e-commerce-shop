<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
class CartController extends Controller
{
    //
    public function addToCart(Product $product){

        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart',$cart);
        notify()->success('Product added to cart');
        return redirect()->back();
    }
}
