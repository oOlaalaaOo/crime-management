@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Station Add</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('home') }}">Cases</a>
            </li>
            <li class="active">
                <a href="{{ route('stations.all') }}">Stations</a>
            </li>
            <li class="active">
                <strong>Station Add</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('stations.all') }}"><i class="fa fa-arrow-left"></i> Station List</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Station</h2>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('stations.add') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                    
                    <div class="form-group @if($errors->has('station')) has-error @endif">
                        <label for="station">Station: </label>
                        <input type="text" id="station" name="station" class="form-control" value="{{ old('station') }}">
                        @if($errors->has('station'))
                        <span class="help-block">{{ $errors->first('station') }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('description')) has-error @endif">
                        <label for="description">Description: </label>
                        <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}">
                        @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-success btn-lg" data-backdrop="static" data-keyboard="false">Add New Station</button>
                        <br />
                        <!-- Modal -->
                        <div class="modal fade" id="submit-case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Action: Add Station</h4>
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