@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-title">
        <h3 style="margin-left: 10px; color:#9A9A9A ;">edit Product</h3>
    </div>
    <div class="card-text">
        <div class="container">

        <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-6">
                    <select class="form-select" name="" aria-label="Default select example">
                        <option selected value="">{{$product->cat_id}}</option>

                      </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" value="{{$product->name}}" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" value="{{$product->slug}}" class="form-control" id="slug" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description" class="form-control" rows="3">{{$product->small_description}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{$product->description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Originale Price</label>
                    <input type="number" value="{{$product->originale_price}}" class="form-control" name="originale_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" value="{{$product->selling_price}}" class="form-control" name="selling_price">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" value="{{$product->taxss}}" class="form-control" name="taxss">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quality</label>
                    <input type="number" value="{{$product->qte}}" class="form-control" name="qte">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{$product->status == '1' ? 'checked' : ''}} name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" {{$product->trending == '1' ? 'checked' : ''}} name="trending">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <textarea name="meta_title" class="form-control" rows="3">{{$product->meta_title}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{$product->meta_description}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea name="meta_keywords" class="form-control" rows="3">{{$product->meta_keywords}}</textarea>
                </div>
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                @if ($product->image)
                    <img src="{{asset('upload/product/'.$product->image)}}" style="width: 100px;" alt="product image">
                @endif
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>

@endsection
