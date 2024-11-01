<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items= Cart::instance('wishlist')->content();
        return view('products.wishlist', compact('items'));
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
        //dd($request->all());
        Cart::instance('wishlist')->add($request->id, $request->name, 1, $request->price)->associate(Product::class);
        return response()->json(['status'=> 200, 'message'=> 'success | Item added to wishlist']);
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
        $product= Cart::instance('wishlist')->get($request->rowId);
        Cart::instance('wishlist')->remove($request->rowId);
        Cart::instance('cart')->add($product->model->id, $product->model->name, 1, $product->model->regular_price)->associate(Product::class);

        flash('success','Item added to cart');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if($request->destroyCheck){
        Cart::instance('wishlist')->remove($request->rowId);
        flash('warning','Item deleted from your wishlist');
        return redirect()->back();
        }else{
            Cart::instance('wishlist')->destroy();
            flash('warning','Wishlist emptied');
            return redirect()->back();
        }
    }
}
