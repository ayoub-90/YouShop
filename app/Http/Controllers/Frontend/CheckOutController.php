<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\order;
use App\Models\orderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;

class CheckOutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qte', '>=', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();


        return view('frontend.checkout', compact('cartitems'));
    }
    public function placeorder(Request $request)
    {
        $order = new order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phoneno');
        $order->address1 = $request->input('adress1');
        $order->address2 = $request->input('adress2');
        $order->city = $request->input('city');
        $order->State = $request->input('State');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->payement_mode = $request->input('payement_mode');
        $order->payement_id = $request->input('payement_id');

        // To Calculate the total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $total += $prod->products->selling_price;
        }
        $order->totale_price = $total;

        $order->trucking_no = 'youShop' . rand(1111, 9999);
        $order->save();

        $order->id;
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            orderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qte = $item->prod_qty;
            $prod->update();
        }

        if (Auth::User()->adress1 == Null) {
            $user = User::where('id', Auth::id())->first();
            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phoneno');
            $user->adress1 = $request->input('adress1');
            $user->adress2 = $request->input('adress2');
            $user->city = $request->input('city');
            $user->state = $request->input('State');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);
        if ($request->input('payement_mode') == "payed by razorpay" || $request->input('payement_mode') == "payed by Paypale") {
            return response()->json(['status' => "order placed successfully"]);
        }
        return redirect('/')->with('status', "order placed successfully");
    }
    public function rayzorpaycheck(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach ($cartitems as $item) {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }
        $fname = $request->input(' fname');
        $lname = $request->input(' lname');
        $email = $request->input(' email');
        $phoneno = $request->input(' phoneno');
        $adress1 = $request->input(' adress1');
        $adress2 = $request->input(' adress2');
        $city = $request->input(' city');
        $State = $request->input(' State');
        $country = $request->input(' country');
        $pincode = $request->input(' pincode');
        return response()->json([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phoneno' => $phoneno,
            'adress1' => $adress1,
            'adress2' => $adress2,
            'city' => $city,
            'State' => $State,
            'country' => $country,
            'pincode' => $pincode,
            'totale_price' => $total_price,
        ]);
    }
}
