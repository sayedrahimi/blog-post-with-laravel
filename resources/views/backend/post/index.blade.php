@extends('backend.layouts.master')
@section('content')
                

    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if (session('success'))
            
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
            
        @endif

        <label for="" style="font-weight: bold;">Search</label>
        <form action="{{ route('post.search') }}" method="GET" class="form-group">
            <input type="text" name="query" placeholder="Search your post by title" required class="form-control">
            <button type="submit" class="btn btn-info float-right mt-2">Search</button>
        </form>
        <br>
        <br>
        <!-- Page Heading -->
       
        <div class="card">
            <div class="card-header" style="font-weight: bold;">Posts
                <a href="{{route('index.create')}}" class="btn btn-success float-right">Create post</a>
                <br>
                <br>
                <a href="{{route('post.trash')}}" class="btn btn-danger float-right">Trash</a>
            
            </div>
            
            <table class="table">
                <thead>
                    <td>No</td>
                    <td>Title</td>
                    <td>sub Title</td>
                    <td>Auther</td>
                    <td>Action</td>
                </thead>
                <tbody>
                
                    @foreach ($posts as $index=>$post)
                        <tr>
                            <td>{{($posts->currentPage()*10)-10 + $index+1}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->sub_title}}</td>
                            <td>{{$post->profile->user->name}}</td>
                            <td>
                                <a href="{{route('delete',['index'=>$post->id])}}" id="delete-btn" class="fa fa-trash"></a>|
                                <a href="{{route('index.edit',['index'=>$post->id])}}" class="fa fa-edit"></a>
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

@section('script')

<script src="{{asset('frontend/js/script.js')}}">
    let deleteBtn = document.getElementById('delete-btn');

    deleteBtn.addEventlistener('click',function(){
        console.log('clicked!')
    })
</script>

@endsection
