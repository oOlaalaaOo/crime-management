@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Crime Type Add</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="active">
                <a href="{{ route('crime.type.all') }}">Crime Type All</a>
            </li>
            <li class="active">
                <strong>Crime Type Add</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('crime.type.all') }}"><i class="fa fa-arrow-left"></i> Crime Type List</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Crime Type</h2>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('crime.type.add') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                    
                    <div class="form-group @if($errors->has('crime_type_name')) has-error @endif">
                        <label for="crime_type_name">Crime Type Name: </label>
                        <input type="text" id="crime_type_name" name="crime_type_name" class="form-control" value="{{ old('crime_type_name') }}">
                        @if($errors->has('crime_type_name'))
                        <span class="help-block">{{ $errors->first('crime_type_name') }}</span>
                        @endif
                    </div>

                    
                    <div class="form-group">
                        <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-success btn-lg" data-backdrop="static" data-keyboard="false">Add New Crime Type</button>
                        <br />
                        <!-- Modal -->
                        <div class="modal fade" id="submit-case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Action: Add Crime Type</h4>
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