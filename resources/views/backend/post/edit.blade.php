@extends('backend.layouts.master')
@section('content')

<div class="card p-3">

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="card-header" style="font-weight: bold">
      create post
    </div>
    <form action="{{route('index.update',['index'=>$post->id])}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class='form-group'>
        <label for="" style="font-weight: bold">Title</label>
        <input type="text" name="title" value="{{$post->title}}" class="form-control" >
      </div>
      <div class='form-group'>
        <label for="" style="font-weight: bold">sub_title</label>
        <input type="text" name="sub_title" value="{{$post->sub_title}}" class="form-control" >
      </div>
      <div class='form-group'>
        <label for="" style="font-weight: bold">Description</label>
        <textarea name="description"cols="20" rows="7" class="form-control my-editor">{{$post->description}}</textarea>
      </div>
      <button class="btn btn-success" type="submit">updata</button>
    </form>
  </div>
@endsection