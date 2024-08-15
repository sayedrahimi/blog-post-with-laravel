@extends('backend.layouts.master')
@section('content')
    <div class="card p-3">
        @if (session('success'))
            <div class="bg-success form-control">
                {{session('success')}}
            </div>
        @endif
        <div class="card-header" style="font-weight: bold">
        Setting
        </div>
        <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class='form-group'>
            <label for="" style="font-weight: bold">Logo</label>
            <input type="file" name="logo" class="form-control" value="{{$setting->logo}}">
            @error('logo')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class='form-group'>
            <label for="" style="font-weight: bold">facebook</label>
            <input type="text" name="facebook" placeholder="Enter your website facebook" value="{{$setting->facebook}}" class="form-control" >
            @error('facebook')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class='form-group'>
            <label for="" style="font-weight: bold">Twitter</label>
            <input type="text" name="twitter" class="form-control" value="{{$setting->twitter}}" placeholder="Enter you website twitter">
            @error('twitter')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class='form-group'>
            <label for="" style="font-weight: bold">email</label>
            <input type="email" name="email" class="form-control" value="{{$setting->email}}" placeholder="Enter you website twitter">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class='form-group'>
            <label for="" style="font-weight: bold">phone</label>
            <input type="number" name="phone" class="form-control" value="{{$setting->phone}}" placeholder="Enter you website twitter">
            @error('phone')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class='form-group'>
            <label for="" style="font-weight: bold">address</label>
            <input type="text" name="address" class="form-control" value="{{$setting->address}}" placeholder="Enter you website twitter">
            @error('address')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button class="btn btn-success" type="submit">save</button>
        </form>
    </div>
@endsection