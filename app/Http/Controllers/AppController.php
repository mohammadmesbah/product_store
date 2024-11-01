<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page= $request->query('page');
        $size= $request->query('size');
        $order= $request->query('order');
        if(!$page){
            $page= 1;
        }
        if(!$size){
            $size= 12;
        }
        if(!$order){
            $order= -1;
        }
        $o_column= '';
        $o_order= '';
        switch($order){
            case 1:
                $o_column= 'created_at';
                $o_order= 'DESC';
                break;
            case 2:
                $o_column= 'created_at';
                $o_order= 'ASC';
                break;
            case 3:
                $o_column= 'sale_price';
                $o_order= 'ASC';
                break;
            case 4:
                $o_column= 'sale_price';
                $o_order= 'DESC';
                break;
            default:
                $o_column= 'id';
                $o_order= 'DESC';
        }

        $brands= Brand::orderBy('name', 'ASC')->get();
        $qBrand= $request->query('brand');

        $categories= Category::orderBy('name', 'ASC')->get();
        $qCategory= $request->query('category');

        
        $prange= $request->query('pricerange');
        if(!$prange){
            $prange= '0,500';
        }
        [$from, $to] = explode(',', $prange);
        /* $from= explode(',', $prange)[0];
        $to= explode(',', $prange)[1]; */

        $products= Product::where(function($query) use($qBrand){
                            $query->whereIn('brand_id', explode(',', $qBrand))->orWhereRaw("'{$qBrand}' = ''");
                            })
                            ->where(function($query) use($qCategory){
                                $query->whereIn('category_id', explode(',', $qCategory))->orWhereRaw("'{$qCategory}' = ''");
                            })
                            ->whereBetween('regular_price', array($from, $to))
                            ->orderBy('created_at', 'desc')->orderBy($o_column, $o_order)->paginate($size);
                            
        return view('shop', compact('products', 'page', 'size', 'order', 'brands', 'qBrand',
                                     'categories', 'qCategory', 'from', 'to', 'prange'));
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cartCountAndWishlistCount()
    {
        $cartCount= Cart::instance('cart')->content()->count();
        $wishlistCount= Cart::instance('wishlist')->content()->count();
        return response()->json(['status'=> 200,'cartCount'=> $cartCount, 'wishlistCount'=> $wishlistCount]);
    }
}
