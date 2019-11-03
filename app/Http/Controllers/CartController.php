<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addCart(Request $request){
        $addCartProduct= Product::find($request->product_id);
        Cart::add(array(
            'id'=>$addCartProduct->id,
            'name'=>$addCartProduct->product_name,
            'quantity'=>$request->qty,
            'price'=>$addCartProduct->selling_price,
            'attributes' =>array(
                'image' => $addCartProduct->product_image
            )
        ));
        return redirect('/show-cart');
    }
    public function showCart(){
        $cartProducts= Cart::getContent();
        //return $cartProducts;
        return view('front.cart.show-cart', ['cartProducts'=>$cartProducts]);
    }
    public function updateCartProduct(Request $request){
        //return $request->productId;
        Cart::update($request->productId, array(
           'quantity'=>array(
                'relative'=>false,
               'value'=> $request->qty
           ),
        ));
        return redirect('/show-cart')->with('message', 'Cart Info Updated');
    }
    public function deleteCartProduct($id){
        Cart::remove($id);
        return redirect('/show-cart')->with('message', 'Cart Product Deleted');
    }
    public function directAddCartProduct($id){
        $directAddCartProduct= Product::find($id);
        //return $directAddCartProduct;
        Cart::add(array(
           'id'=> $directAddCartProduct->id,
            'name'=>$directAddCartProduct->product_name,
            'price'=>$directAddCartProduct->selling_price,
            'quantity'=>1,
            'attributes'=>array(
                'image'=>$directAddCartProduct->product_image
            )
        ));
        return redirect('/show-cart');
    }
}
