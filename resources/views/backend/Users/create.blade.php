@extends('backend.layouts.master')
@section('content')

<form action="{{route('user.store')}}" method="post" class="form-group m-3">
    
    @csrf
    <label for="">Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter your name">
    <label for="">Email</label>
    <input type="text" name="email" class="form-control" placeholder="Enter your email">
    <label for="">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Enter your password">
    <label for="">Confirm password</label>
    <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat your password">

    <label for="">profile_pic</label>
    <input type="text" name="profile_pic" class="form-control">

    <button type="submit" class="btn btn-success float-right mt-2">Save</button>
</form>

@endsection