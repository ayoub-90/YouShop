@extends('layouts.frontend')
@section('title')
    Welcom to YouShop
@endsection
@section('content')
@include('layouts.inc.slider')
{{-- trending products --}}
    <div class="py-5">
        <div class="container">
            <div class="row featured-product">
                <h2 class="mt-2">featured product</h2>
                     <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($featured_products as $rod)
                        <div class="item">

                            <div class="card" style="border:0;">
                                <img src="{{asset('upload/product/'.$rod->image)}}" alt="product image" height="250px" width="200px" style="margin-left: 30px">
                                <div class="card-body">
                                    <h5 style="color: black">{{$rod->name}}</h5>
                                    <small style="color: black" class="float-start">{{$rod->selling_price}} DH</small>
                                    <small style="color: black" class="float-end"> <s>{{$rod->originale_price}} DH </s></small>
                                </div>
                            </div>

                        </div>
                    @endforeach
            </div>
        </div>
    </div>
{{-- end of product --}}
{{-- trending categories --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="mt-2">Trending Categories</h2>
                     <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($trending_categories as $category)
                        <div class="item">
                            <a href="{{url('category/'.$category->slug)}}">
                                <div class="card" style="border:0;">
                                    <img src="{{asset('upload/'.$category->image)}}" alt="product image" >
                                    <div class="card-body">
                                        <h5 style="color: black">{{$category->name}}</h5>
                                        <p style="color: black">
                                                {{$category->description}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
            </div>
                    </div>

        </div>
    </div>
{{-- end of product --}}
    @endsection
@section('script')
    <script>
        jQuery(document).ready(function() {
            jQuery('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
                });
        });
    </script>
@endsection
