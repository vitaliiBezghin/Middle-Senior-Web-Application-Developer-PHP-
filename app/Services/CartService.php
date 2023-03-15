<?php

namespace App\Services;

use App\Http\Requests\AddToCartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartService
{
    public function removeCart()
    {
        Cart::where('cart', \request()->ip())->delete();

        return response()->json(null, 204);
    }
    public function decrease($id)
    {
        $cart = Cart::with('products')->where('cart', \request()->ip())->first();
        if ($cart) {
            $cartItem = $cart->products->where('id', $id)->first();
            if ($cartItem) {
                if ($cartItem->pivot->quantity > 1){
                    $cartItem->pivot->quantity -= 1;
                    $cartItem->pivot->price -= $cartItem->price;
                    $cartItem->pivot->save();
                }else{
                    $this->remove($id);
                }
            }
        }

        return response()->json([
            'cart' => $cart->load('products')
        ]);

    }

    public function remove($id)
    {
        $cart = Cart::with('products')->where('cart', \request()->ip())->first();
        $cart->products()->detach($id);

        return response()->json([
            'cart' => $cart->load('products')
        ]);
    }

    public function cart()
    {
        return response()->json([
            'cart' => Cart::with('products')->where('cart', \request()->ip())->first()
        ]);
    }

    public function add(AddToCartRequest $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = Cart::with('products')->where('cart', $request->ip())->first();

        if (!$cart) {
            $cart = new Cart([
                'cart' => $request->ip()
            ]);
            $cart->save();
            $cart->products()->attach($product->id, [
                'price' => $product->price,
                'quantity' => 1,
            ]);
            return response()->json([
                'cart' => $cart->load('products')
            ]);
        } else {
            $cartItem = $cart->products->where('id', $request->product_id)->first();
            if ($cartItem) {
                $cartItem->pivot->quantity = $cartItem->pivot->quantity + 1;
                $cartItem->pivot->price = $cartItem->price * $cartItem->pivot->quantity;
                $cartItem->pivot->save();
            } else {
                $cart->products()->attach($product->id, [
                    'price' => $product->price,
                    'quantity' => 1,
                ]);
            }
        }

        return response()->json([
            'cart' => $cart->load('products')
        ]);
    }
}
