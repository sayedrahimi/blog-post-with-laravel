@extends('backend.layouts.master')
@section('content')

<div class="card p-3">
    <div class="card-header" style="font-weight: bold">
      create post
    </div>
    <form action="{{route('index.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class='form-group'>
        <label for="" style="font-weight: bold">Title</label>
        <input type="text" name="title" placeholder="Enter your title" class="form-control" >
      </div>
      <div class='form-group'>
        <label for="" style="font-weight: bold">sub_title</label>
        <input type="text" name="sub_title" placeholder="Enter your title" class="form-control" >
      </div>
      <div class='form-group'>
        <label for="" style="font-weight: bold">Description</label>
        <textarea name="description"cols="20" rows="7" class="form-control my-editor" placeholder="Enter your description"></textarea>
      </div>
      <button class="btn btn-success" type="submit">save</button>
    </form>
  </div>
@endsection