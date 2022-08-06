@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-title">
        <h3 style="margin-left: 10px; color:#9A9A9A ;">Edit Category </h3>
    </div>
    <div class="card-text">
        <div class="container">

        <form action="{{url('update-catergory/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb3">
                    <label for="name">Name</label>
                    <input type="text" value="{{$category->name}}" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" value="{{$category->slug}}" class="form-control" id="slug" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{$category->name}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{$category->status == '1' ? 'checked' : ''}} name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{$category->popular == '1' ? 'checked' : ''}} name="popular">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" value="{{$category->meta_title}}" name="meta_title" class="form-control" >
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{$category->meta_description}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea name="meta_keywords" class="form-control" rows="3">{{$category->meta_keywords}}</textarea>
                </div>
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                @if ($category->image)
                    <img src="{{asset('upload/'.$category->image)}}" style="width: 100px;" alt="Category image">
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
