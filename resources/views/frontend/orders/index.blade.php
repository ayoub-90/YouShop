@extends('layouts.frontend')
@section('title')
    My Orders
@endsection
@section('content')
    <div class="container py-5" style="margin-top: 60px">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                   <h4 class="text-white"> My Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                    <td>{{ $item->trucking_no }}</td>
                                    <td>{{ $item->totale_price }}</td>
                                    <td>{{ $item->status == '0' ?'pending' : 'completed' }}</td>
                                    <td><a href="{{url('view-order/'.$item->id)}}" class="btn btn-primary">View</a></td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
@endsection
