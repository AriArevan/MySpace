@extends('layouts.app')
@section('content')
        
        <div class="container">
            <div class="row">
              <div class="col-md-10">
                <h3>List of posts</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('posts.create') }}">Create New post</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

        <table class="table table-hover table-sm">
          <tr>
            <th width = "50px"><b>No.</b></th>
            <th width = "300px">post </th>
            <th>post</th>
            <th width = "180px">Action</th>
        </tr>

        @foreach ($posts as $post)
        <tr>
          <td>{{$posts->title}}</td>
          <td>{{$posts->body}}</td>
          <td>
            <form action="{{ route('posts.destroy', $posts->id) }}" method="post">
                <a class="btn btn-sm btn-success" href="{{route('posts.show',$posts->id)}}">Show</a>
                <a class="btn btn-sm btn-warning" href="{{route('posts.edit',$posts->id)}}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
