@extends('layouts.app')

@section('content')
@foreach($users as $user)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<img src="/uploads/images/{{$user->image}}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
            <h2><a href="{{ route('users.profile')}}">{{ $user->first_name }}</a>'s Profile
                <small class="text-bold">&commat;{{ Auth::user()->username}} {{ Auth::user()->relation_status}}  
            </h2>
            <hr>	
            <a href="javascript"></a>
        </div>
    </div>
</div>
@endforeach
@endsection
