@extends('backend.layouts.master')
@section('content')

<div class="card">
    <div class="card-header" style="font-weight: bold;">
        Users
        <a href="{{route('user.create')}}" class="btn btn-success float-right">Create user</a>
    </div>
    <table class="table m-3 p-3">
        <thead>
                <td>No</td>
                <td>Name</td>
                <td>Email</td>
                
                <td>Action</td>
            
        </thead>
        @php
            $number = 0;
        @endphp

        <tbody>
            @foreach ($users as $index=>$user )
                <tr>
                    <td>{{++$number}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    
                    <td><a href="{{route('user.delete',['id'=>$user->id])}}" class="fa fa-trash"></a>|
                        <a href="{{route('user.edit',['id'=>$user->id])}}" class="fa fa-edit"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection