@extends('layouts.frontend')
@section('title')
{{$product->name}}
@endsection
@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <form action="{{url('/add-rating')}}" method="POST">
                @method('POST')
                @csrf
                <input type="hidden" name="product_id" value=" {{$product->id}}">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rate {{$product->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                      </div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="py-3 mb-4 shadow-sm bg-warning border-top" style="margin-top: 60px;">
    <div class="container">
       <h6 class="mb-8">
           <a href="{{ url('category') }}">
              Collections
           </a>/
           <a href="{{ url('category/'.$product->category->slug) }}">
             {{ $product->category->name }}
           </a>/
           <a href="{{ url('category/'.$product->category->slug.'/'.$product->slug) }}">
              {{ $product->name }}
           </a>
        </h6>
    </div>
</div>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{asset('upload/product/'.$product->image)}}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$product->name}}
                            @if ($product->trending == "1")
                                <label style="font-size:16px " class="float-end badge bg-danger trendung_tag">Trending</label>
                            @endif

                        </h2>
                        <hr>
                        <label class="me-3">Originale Price <s> Rs {{$product->originale_price}}</s></label>
                        <label class="me-3">Selling Price : Rs {{$product->selling_price}}</label>
                        <div class="rating">
                            @php
                                $rate= number_format($rating_value)
                            @endphp
                            @for($i = 1; $i <=$rate ; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for($j = $rate+1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if($rating->count() > 0 )
                                {{ $rating->count() }} Ratings
                                @else
                                    No Ratings
                                @endif
                            </span>
                        </div>

                        <p class="mt-3">
                            {!!$product->small_description!!}
                        </p>
                        <hr>
                        @if ($product->qte >0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                        <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity " value="1" class="form-control qty-input">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br/>
                                @if ($product->qte >0)
                                <button type="button" class="btn btn-primary me-3 addtocartbtn float-start">Add to  card <i class="fa fa-shopping-cart"></i></button>
                                 @endif
                                <button type="button" class="btn btn-success me-3 addtowishlist float-start">Add to  Wishlist <i class="fa fa-heart"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
                <a><hr class="dropdown-divider"></a>
                <h3>description</h3>
                <p>{!!$product->description!!}</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    rate product
                  </button>

                </div>
            </div>
        </div>
    </div>
@endsection

