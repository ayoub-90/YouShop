@extends('layouts.admin')
@section('title')
    orders
@endsection
@section('content')
    <div class="container" style="margin-top: 70px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <h4 style="margin-left: 10px; color:#9A9A9A "> New Orders
                        <a href="{{'order-history'}}" class="btn btn-warning float-right">Order History</a>
                       </h4>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                        <td>{{date('d-m-y / h:i',strtotime($item->created_at))}}</td>
                                        <td>{{ $item->trucking_no }}</td>
                                        <td>{{ $item->totale_price }}</td>
                                        <td>{{ $item->status == '0' ?'pending' : 'completed' }}</td>
                                        <td><a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">View</a></td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
