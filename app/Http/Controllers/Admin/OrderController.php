<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = order::where('status', '0')->get();
        return view('admin.orders.index', compact('orders'));
    }
    public function view($id)
    {
        $orders = order::where('id', $id)->first();
        return view('admin.orders.view', compact('orders'));
    }
    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status', "Order Updated Successfully");
    }
    public function orderhistory()
    {
        $orders = order::where('status', '1')->get();
        return view('admin.orders.history', compact('orders'));
    }
}
