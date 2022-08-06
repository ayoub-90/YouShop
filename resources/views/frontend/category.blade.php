@extends('layouts.frontend')
@section('title')
    Category
@endsection
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All cataegories</h2>
                    <div class="row">
                        @foreach ($category as $cate)

                        <div class="col-md-3 mb-3">
                             <a href="{{url('category/'.$cate->slug)}}">
                                <div class="card h-100" style="border: 0px">
                                    <img src="{{asset('upload/'.$cate->image)}}" alt="category image">
                                    <div class="card-body">
                                        <h5>{{$cate->name}}</h5>
                                        <p>{{$cate->description}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
