@extends('layouts.frontend')
@section('title')
    My Cart
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top" style="margin-top: 60px;">
    <div class="container">
       <h6 class="mb-8">
           <a href="{{ url('/') }}">
              home
           </a>/
           <a href="{{ url('cart') }}">
             Cart
           </a>
        </h6>
    </div>
</div>
<div class="container" style="margin-top: 80px">
    <div class="card shadow ">
        @if ($cartitems -> count() > 0)
                    <div class="card-body">
                        @php $totale = 0; @endphp
                        @foreach ($cartitems as $item)
                                <div class="row product_data">
                                    <div class="col-md-1">
                                        <img src="{{asset('upload/product/'.$item->products->image)}}" height="70px" width="70px" alt="Image here">
                                    </div>
                                    <div class="col-md-3">
                                        <h6 style="margin-top: 25px">{{$item->products->name}}</h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h6 style="margin-top: 25px">{{$item->products->selling_price}} €</h6>
                                    </div>

                                    <div class="col-md-3" style="margin-top:-5px ">
                                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                        @if ($item->products->qte >= $item->prod_qty)
                                        <label for="Quantity" style="margin-left:-70px">Quantity</label>
                                        <div class="input-group text-center mb-3" style="width:13epx;margin-left:-70px">
                                            <button class="input-group-text chagequantity decrement-btn">-</button>
                                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}} ">
                                            <button class="input-group-text chagequantity increment-btn">+</button>
                                        </div>
                                        @php $totale += $item->products->selling_price * $item->prod_qty @endphp
                                        @else
                                        <label class="badge bg-danger" style="margin-left:-40px ;margin-top: 25px">Out of stock</label>
                                        @endif

                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-danger badge delet-cart-item" style="margin-top: 25px"><i class="fa fa-trash"></i> Remove</button>
                                    </div>
                                </div>

                        @endforeach
                    </div>
                    <div class="card-footer">
                        <h6>Totale Price : {{$totale}} €</h6>
                        <a href="{{url('checkout')}}" class="btn btn-outline-success float-end " style="margin-top:-30px ">Proceed to Checkout</a>
                    </div>
        @else
                <div class="card-body text-center">
                    <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
                    <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                </div>
        @endif

    </div>
</div>
@endsection
