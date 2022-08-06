@extends('layouts.frontend')
@section('title')
{{$category->name}}
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0" style="margin-top:50px">Collection / {{$category->name}} </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row ">
            <h2 class="mt-2">{{$category->name}} </h2>
                 {{-- <div class="owl-carousel owl-theme"> --}}

                    @foreach ($products as $rod)

                        <div class="col-md-3 mb-3">
                            <a href="{{url('category/'.$category->slug.'/'.$rod->slug)}}">
                                <div class="card">
                                        <img src="{{asset('upload/product/'.$rod->image)}}" alt="product image" height="250px" width="200px" style="margin-left: 30px">
                                        <div class="card-body">
                                            <h5 style="color: black">{{$rod->name}}</h5>
                                            <small style="color: black" class="float-start">{{$rod->selling_price}} DH</small>
                                            <small style="color: black" class="float-end"> <s>{{$rod->originale_price}} DH </s></small>
                                        </div>
                                </div>
                            </a>
                        </div>

                @endforeach
                </div>
    </div>
</div>
@endsection
