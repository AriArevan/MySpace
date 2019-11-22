@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="page-section">
                <div class="d-flex justify-content-between">
                    <h2 class="page-section-header">Edit profile</h2>
                </div>
                    <form enctype="multipart/form-data" action="{{URL::to('profile')}}" method="POST">
                        <input type="file" name="image">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" name="btn btn-succes">Change Profile picture</button>
                    </form>

                    <form action="{{ route('profile.update', $user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                      @method('PUT')
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="zipcode">zipcode</label>
                            <input type="text" name="zipcode" value="{{ old('zipcode', $user->zipcode) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="relation_status">{{ __('relation_status') }}</label>
 
                            <select name="relation_status" type="text" id="relation_status" value="{{ old('relation_status', $user->relation_status)}} "class="col-md-6">
                                <option>Single</option>
                                <option>Dating</option>
                                <option>Engaged</option>
                                <option>Married</option>
                                <option>It's complicated</option>
 
                                @error('relation_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>

                    </form>
            </div>
        </div>
    </div>
</div>
        @endsection
