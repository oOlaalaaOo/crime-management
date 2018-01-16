@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Rank Update</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="active">
                <a href="{{ route('rank.all') }}">Ranks</a>
            </li>
            <li class="active">
                <strong>Rank Update</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('rank.all') }}"><i class="fa fa-arrow-left"></i> Rank List</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Rank</h2>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('rank.update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                    <input type="hidden" name="rank_id" value="{{ $rank->rank_id }}">
                    <div class="form-group @if($errors->has('code')) has-error @endif">
                        <label for="code">Title: </label>
                        <input type="text" id="code" name="code" class="form-control" value="{{ old('code', $rank->code) }}">
                        @if($errors->has('code'))
                        <span class="help-block">{{ $errors->first('code') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                        <label for="description">Description: </label>
                        <input type="text" id="description" name="description" class="form-control" value="{{ old('description', $rank->description) }}">
                        @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-success btn-lg" data-backdrop="static" data-keyboard="false">Update Rank</button>
                        <br />
                        <!-- Modal -->
                        <div class="modal fade" id="submit-case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Action: Update Rank</h4>
                                    </div>
                                    <div class="modal-body">
                                        <label>Please click submit now to confirm action</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Submit Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection