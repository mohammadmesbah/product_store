<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Flasher\Laravel\Facade\Flasher;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems= Cart::instance('cart')->content();

        return view('carts.cart',compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $product= Product::findOrFail($request->id);
        $price= $product->sale_price? $product->sale_price : $product->regular_price;
        Cart::instance('cart')->add($product->id,$product->name,$product->quantity,$price)->associate(Product::class);

        flash('success','Item added to cart');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        /* $cartContents = Cart::instance('cart')->content();
        dd($cartContents); */
        Cart::instance('cart')->update($request->rowId,$request->quantity);
        //Flasher::success('Cart Updated','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //dd($request->destroyCheck);
        if($request->destroyCheck){
        Cart::instance('cart')->remove($request->rowId);
        flash('warning','Item deleted from your cart');
        return redirect()->back();

        }else{
            Cart::instance('cart')->destroy();
            flash('warning','Cart emptied');
            return redirect()->back();
        }

    }
}
