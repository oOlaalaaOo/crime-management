@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>User</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('users.all') }}">User</a>
            </li>
            <li class="active">
                <strong>Update User</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('users.all') }}"><i class="fa fa-arrow-left"></i> Back</a>
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
                    
                    <form action="{{ route('users.update') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                            @if($errors->has('name'))
                            <span class="text-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        @if($user->user_type_id == 2)
                        <div class="form-group @if($errors->has('user_rank_id')) has-error @endif">
                            <label>Officer Rank</label>
                            <select class="form-control" name="user_rank_id">
                                @foreach($ranks as $rank)
                                    <option value="{{ $rank->rank_id }}" @if(old('user_rank_id', $user->rank_id) == $rank->rank_id) selected @endif>{{ $rank->code }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user_rank_id'))
                            <span class="text-block">{{ $errors->first('user_rank_id') }}</span>
                            @endif
                        </div>
                        
                        <div class="form-group @if($errors->has('station_id')) has-error @endif">
                            <label>Station No.</label>
                            <select class="form-control" name="station_id">
                                @foreach($stations as $station)
                                    <option value="{{ $station->police_station_id }}" @if(old('station_id', $user->police_station_id) == $station->police_station_id) selected @endif>{{ $station->station }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('station_id'))
                                <span class="text-block">{{ $errors->first('station_id') }}</span>
                            @endif
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Status: <input type="checkbox" name="user_status" @if(old('user_status', $user->status) == 'active') checked @endif value="active"></label>
                        </div>
                        
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">Update User</button>
                        </div>
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection