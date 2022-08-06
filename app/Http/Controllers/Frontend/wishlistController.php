<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class wishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }
    public function addwishlist(Request $request)
    {
        $product_id = $request->input('product_id');
        if (Auth::check()) {
            $prod_check = Product::find($product_id);
            if ($prod_check) {
                if (Wishlist::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => "Product Already added to card"]);
                } else {
                    $wish = new Wishlist();
                    $wish->prod_id = $product_id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json(['status' => "Product added to wishlist "]);
                }
            } else {
                return response()->json(['status' => "Product doesnot exist"]);
            }
        } else {
            return response()->json(['status' => "login to continue"]);
        }
    }
    public function deletitems(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Item removed from wishlist"]);
            }
        } else {
            return response()->json(['status' => "login to continue"]);
        }
    }
    public function wishcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishcount]);
    }
}
