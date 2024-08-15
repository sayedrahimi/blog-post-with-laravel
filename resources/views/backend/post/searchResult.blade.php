@extends('backend.layouts.master')
@section('content')

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Sub Title</th>
            <!-- Add other columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->sub_title }}</td>
                <!-- Add other columns as needed -->
            </tr>
        @endforeach
    </tbody>
    <tbody>
        @if($posts->isEmpty())
            <tr>
                <td colspan="3">No posts found.</td>
            </tr>
        @else
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->sub_title }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

@endsection