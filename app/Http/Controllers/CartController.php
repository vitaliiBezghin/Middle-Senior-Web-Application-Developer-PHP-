<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct(public CartService $cartService)
    {

    }
    public function cart()
    {
        return $this->cartService->cart();
    }

    public function add(AddToCartRequest $request)
    {
        return $this->cartService->add($request);
    }

    public function remove($id)
    {
        return $this->cartService->remove($id);
    }

    public function decrease($id)
    {
        return $this->cartService->decrease($id);
    }
    public function removeCart()
    {
        return $this->cartService->removeCart();
    }
}
