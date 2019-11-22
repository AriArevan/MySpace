@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New posts </h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('posts.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>title :</strong>
          <input type="text" name="title" class="form-control" value="{{ old('title')}}" placeholder="title">
        </div>
        <div class="col-md-12">
          <strong>body :</strong>
          <textarea class="form-control" placeholder="body" name="body" value="{{ old('body')}}" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('posts.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection