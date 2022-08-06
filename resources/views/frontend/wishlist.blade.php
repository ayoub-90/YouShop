@extends('layouts.frontend')
@section('title')
wishlist
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top" style="margin-top: 60px;">
    <div class="container">
       <h6 class="mb-8">
           <a href="{{ url('/') }}">
              home
           </a>/
           <a href="{{ url('wishlist') }}">
             wishlist
           </a>
        </h6>
    </div>
</div>
<div class="container" style="margin-top: 80px">
    <div class="card shadow ">
        <div class="card-body">
            @if ($wishlist->count() > 0)
                @foreach ($wishlist as $item)
                        <div class="row product_data">
                            <div class="col-md-2">
                                <img src="{{asset('upload/product/'.$item->products->image)}}" height="70px" width="70px" alt="Image here">
                            </div>
                            <div class="col-md-2">
                                <h6 style="margin-top: 25px">{{$item->products->name}}</h6>
                            </div>
                            <div class="col-md-2">
                                <h6 style="margin-top: 25px">{{$item->products->selling_price}} €</h6>
                            </div>

                            <div class="col-md-2" >
                                <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                @if ($item->products->qte >= $item->prod_qty)
                                <div style="margin-top: -30px">
                                    <h6 style="margin-top:25px;font-size:10px">In Stock</h6>
                                    <div class="input-group text-center mb-3" style="width:13epx;">
                                        <button class="input-group-text  decrement-btn">-</button>
                                        <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                        <button class="input-group-text  increment-btn">+</button>
                                    </div>
                                </div>

                                @else
                                <label class="badge bg-danger" style="margin-left:70px">Out of stock</label>
                                @endif

                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success badge addtocartbtn" style="margin-top: 25px"><i class="fa fa-shopping-cart"></i> Add to Crat</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger badge delet-wishlist-item" style="margin-top: 25px"><i class="fa fa-trash"></i> Remove</button>
                            </div>
                        </div>

                @endforeach


            @else
            <h4> no product in wishlist</h4>
            @endif
        </div>

    </div>
</div>
@endsection
