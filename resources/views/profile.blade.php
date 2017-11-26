@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.html">Dashboard</a>
            </li>
            {{-- <li class="active">
                <strong>Breadcrumb</strong>
            </li> --}}
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Account Details</h5>
                    <div class="ibox-content">
                        <form action="{{ route('user.update.profile.details') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="old_username" value="{{ $data->username }}">
                            <div class="form-group @if($errors->has('name')) has-error @endif">
                                <label for="name">Full Name: </label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}">
                                @if($errors->has('name'))
                                <small class="text-block">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="form-group @if($errors->has('username')) has-error @endif">
                                <label for="username">Username (email): </label>
                                <input type="text" id="username" name="username" class="form-control" value="{{ $data->username }}">
                                @if($errors->has('username'))
                                <small class="text-block">{{ $errors->first('username') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Update Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Account Password</h5>
                    <div class="ibox-content">
                        <form action="{{ route('user.update.profile.password') }}" method="post">
                            {{ csrf_field() }}
                            
                            <div class="form-group @if($errors->has('old_password')) has-error @endif">
                                <label for="old_password">Current Password: </label>
                                <input type="password" id="old_password" name="old_password" class="form-control">
                                @if($errors->has('old_password'))
                                <small class="text-block">{{ $errors->first('old_password') }}</small>
                                @endif
                            </div>
                            <div class="form-group @if($errors->has('password')) has-error @endif">
                                <label for="username">New Password: </label>
                                <input type="password" id="password" name="password" class="form-control">
                                @if($errors->has('password'))
                                <small class="text-block">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                            <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                                <label for="password_confirmation">Confirm Password: </label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                @if($errors->has('password_confirmation'))
                                <small class="text-block">{{ $errors->first('password_confirmation') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    @endsection