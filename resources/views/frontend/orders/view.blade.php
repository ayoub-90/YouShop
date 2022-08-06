@extends('layouts.frontend')
@section('title')
    My Orders
@endsection
@section('content')
    <div class="container py-5" style="margin-top: 60px">
        <div class="row">
        <div class="col-md-12">

            <div class="card shadow">
                <div class="card-header bg-primary">
                   <h4 class="text-white">Order View</h4>
                   <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end" style="margin-top: -39px"><i class="fa fa-arrow-right"></i></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h5 style="text-align: center">Shiping details</h5>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border p-2">{{ $orders->fname }}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{ $orders->lname }}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{ $orders->email }}</div>
                            <label for="">Contact No</label>
                            <div class="border p-2">{{ $orders->phone }}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{ $orders->address1 }},
                                {{ $orders->address2 }},
                                {{ $orders->city }},
                                {{ $orders->state }},
                                {{ $orders->country }},
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{$orders->pincode}}</div>
                        </div>
                        <div class="col-md-6">
                            <h5 style="text-align: center">Order details</h5>
                            <hr>
                            <table class="table table-bordered" style="margin-top:33px ">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders->orderitems as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <img src="{{asset('upload/product/'.$item->products->image) }}" width="50px" alt="Product">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Grand Total :<span class="float-end"> {{ $orders->totale_price }} $</span></h4>
                            <h4 class="px-2">payement mode :<span class="float-end"> {{ $orders->payement_mode }} </span></h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
@endsection
