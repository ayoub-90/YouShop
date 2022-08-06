@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="margin-left: 10px; color:#9A9A9A ;">Users Details</h3>
                    <h4 class="admin">{{$user->role_as == '0' ? 'user' : 'admin'}}</h4>
                    <a href="{{url('users')}}" class="btn btn-warning text-white float-end" style="margin-top: -60px"><i class="fa fa-arrow-right"></i></a>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">First Name</label>
                            <div class="p-2 border mt-3">{{$user->name}}</div>
                            <label for="">Last Name</label>
                            <div class="p-2 border mt-3">{{$user->lname}}</div>
                            <label for="">Email</label>
                            <div class="p-2 border mt-3">{{$user->email}}</div>
                        </div>
                        <div class="col-md-4">
                                <label for="">Phone</label>
                            <div class="p-2 border mt-3">{{$user->phone}}</div>
                                <label for="">Adress 1</label>
                            <div class="p-2 border mt-3">{{$user->adress1}}</div>
                                <label for="">Adress 2</label>
                            <div class="p-2 border mt-3">{{$user->adress2}}</div>
                        </div>
                        <div class="col-md-4">
                                <label for="">City</label>
                            <div class="p-2 border mt-3">{{$user->city}}</div>
                                <label for="">State</label>
                            <div class="p-2 border mt-3">{{$user->state}}</div>
                                <label for="">Country</label>
                            <div class="p-2 border mt-3">{{$user->country}}</div>
                                <label for="">Pincode</label>
                            <div class="p-2 border mt-3">{{$user->pincode}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
