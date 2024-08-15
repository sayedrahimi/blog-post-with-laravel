@extends('backend.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">Update users</div>
    <form action="{{route('user.update',['id'=>$user->id])}}" method="post" class="m-3">
        @csrf
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Enter your name" value="{{$user->name}}" class="form-control">
        <label for="">Email</label>
        <input type="text" name="email" placeholder="Enter your email" value="{{$user->email}}" class="form-control">
        <label for="">password</label>
        <input type="password" name="password" placeholder="Enter your password" value="{{$user->password}}" class="form-control">
        <label for="">profile</label>
        <input type="text" name="profile_pic" class="form-control" value="{{$user->profile->profile_pic}}">

        <button type="submit" class="btn btn-success float-right mt-2 px-3">Save</button>
    </form>
</div>
@endsection