@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 style="margin-left: 10px; color:#9A9A9A ;">Product Page</h3>
    </div>
    <hr>
    <div class="card-body">
        <table class="table table-bordered ">
            <thead >
                <tr>
                    <th class="id">id</th>
                    <th class="">category</th>
                    <th class="name">Name</th>
                    <th class="">Selling price</th>
                    <th>Image</th>
                    <th class="actions">Action</th>
                </tr>

            </thead>

            <tbody>
                @foreach ($products as $item)
                     <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->cat_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->selling_price}}</td>
                        <td>
                            <img src="{{asset('upload/product/'.$item->image)}}" class="cart-image" alt="image here">
                        </td>
                        <td>
                            <div class="acti">
                            <a href="{{url('edit-product/' . $item->id)}}" class="btn btn-primary btn-info btn-sm">Edit</a>
                            <a href="{{url('delet-product/' . $item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
