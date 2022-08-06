@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 style="margin-left: 10px; color:#9A9A9A ;">Regisetered Users</h3>
    </div>
    <hr>
    <div class="card-body">
        <table class="table table-bordered ">
            <thead >
                <tr>
                    <th class="id">id</th>
                    <th class="name">Name</th>
                    <th class="">Email</th>
                    <th>Phone</th>
                    <th class="actions">Action</th>
                </tr>

            </thead>

            <tbody>
                @foreach ($user as $item)
                     <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name .' ' .$item->lname}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>
                            <div class="acti">
                            <a href="{{url('view-user/' . $item->id)}}" class="btn btn-primary btn-info btn-sm">View</a>
                        </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
