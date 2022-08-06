<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingConroller extends Controller
{
    public function add(Request $request)
    {
        $start_rated = $request->input('rate');
        $product_id = $request->input('product_id');
        $product_check = Product::where('id', $product_id)->where('status', '0')->first();
        if ($product_check) {
            $verified_purshase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $product_id)->get();

            if ($verified_purshase->count() > 0) {
                $exists_ratting = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
                if ($exists_ratting) {
                    $exists_ratting->start_rated = $start_rated;
                    $exists_ratting->update();
                } else {

                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product_id,
                        'start_rated' => $start_rated,
                    ]);
                }
                return redirect()->back()->with('status', "thank you for rating");
            } else {
                return redirect()->back()->with('status', "You cannot Rate this product ");
            }
        } else {
            return redirect()->back()->with('status', "the link you followed is broken ");
        }
    }
}
