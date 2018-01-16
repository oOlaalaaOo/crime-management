@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Users</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('users.all') }}">Users</a>
            </li>
            <li class="active">
                <strong>Add User</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Add User</h2>
                </div>
                    
                <div class="ibox-content">
                    
                    <form action="{{ route('users.add') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            @if($errors->has('name'))
                            <span class="text-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('user_rank_id')) has-error @endif">
                            <label>Officer Rank</label>
                            <select class="form-control" name="user_rank_id">
                                <option value="">-Select-</option>
                                @foreach($ranks as $rank)
                                    <option value="{{ $rank->rank_id }}" @if(old('user_rank_id') == $rank->rank_id) selected @endif>{{ $rank->code }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user_rank_id'))
                            <span class="text-block">{{ $errors->first('user_rank_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('username')) has-error @endif">
                            <label>Username</label>
                            <input type="text" name="username" value="{{ old('username') }}" class="form-control">
                            @if($errors->has('username'))
                            <span class="text-block">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            <label>Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                            @if($errors->has('password'))
                            <span class="text-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control">
                            @if($errors->has('password_confirmation'))
                            <span class="text-block">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">Add New User</button>
                        </div>
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection