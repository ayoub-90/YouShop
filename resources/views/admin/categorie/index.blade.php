@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 style="margin-left: 10px; color:#9A9A9A ;">category Page</h3>
    </div>
    <hr>
    <div class="card-body">
        <table class="table table-bordered ">
            <thead >
                <tr>
                    <th class="id">id</th>
                    <th class="name">Name</th>
                    <th class="desc">Description</th>
                    <th>Image</th>
                    <th class="action">Action</th>
                </tr>

            </thead>

            <tbody>
                @foreach ($category as $item)
                     <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <img src="{{asset('upload/'.$item->image)}}" class="cart-image" alt="image here">
                        </td>
                        <td>
                            <div class="act">
                            <a href="{{url('edit-prod/' . $item->id)}}" class="btn btn-primary btn-info">Edit</a>
                            <a href="{{url('delet-categories/' . $item->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
