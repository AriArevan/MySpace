@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-6">
            @auth
            @if(Auth::user()->id == $user->id)
                <h4><strong><a href="{{URL::to('profile')}}/{{Auth::user()->id}}/edit">Edit</a></strong></h4>
            @csrf
            @endif

            <div class="col-md-12">
                <img src="/uploads/images/{{$user->image}}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                <h2>{{ $user->first_name }}'s Profile
                    <small class="text-muted">&commat;{{ $user->username}} {{ $user->relation_status}}</small>
                </h2>
                <hr>
                <h2>Good. you're logged in! You can find {{ $user->username }}'s information below </h2>

                <h3>First name: {{ $user->first_name}}</h3>
                <h3>Last name: {{ $user->last_name }}</h3>
                <h3>zipcode: {{ $user->zipcode }}</h3>
                <h3>email: {{ $user->email }}</h3>
            </div>
            <div class="card">
            </div>
        </div>
    </div>

    @else

    <div class="col-md-12">
        <img src="/uploads/images/{{$user->image}}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
        <h2>{{ $user->first_name }}'s Profile
            <small class="text-muted">&commat;{{ $user->username}} {{ $user->relation_status}}</small>
        </h2>
        <hr>
    </div>
    <div class="card">
        <h2>To see {{ $user->username }}'s information. You will have to login or make a new account. </h2>

        @endif


        @endsection
