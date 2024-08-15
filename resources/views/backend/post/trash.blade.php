@extends('backend.layouts.master')
@section('content')
                

    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if (session('success'))
        <div class="alert alert-danger" role="alert">
            {{session('success')}}
        </div>
        @endif

        <!-- Page Heading -->
       
        <div class="card">
            <div class="card-header">Trash
            </div>
            <table class="table">
                <thead>
                    <td>No</td>
                    <td>Title</td>
                    <td>sub Title</td>
                    <td>Action</td>
                </thead>
                <tbody>
                
                    @foreach ($posts as $index=>$post)
                    
                        <tr>
                            <td>{{($posts->currentPage()*10)-10 + $index+1}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->sub_title}}</td>
                            <td>
                                <form action="{{ route('post.deleteFromTrash', ['index' => $post->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa fa-trash" style="border:none; background:none; cursor:pointer;"></button>
                                </form>|
                                <a href="{{route('post.restore',['index'=>$post->id])}}" class="fa-solid fa-trash-can-arrow-up">Restore</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <tfoot>
                {{$posts->links()}}
            </tfoot>
          </div>

    </div>

        
@endsection
