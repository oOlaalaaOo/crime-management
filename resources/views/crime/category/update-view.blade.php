@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-6">
        <h2>Crime Category Update</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="active">
                <a href="{{ route('crime.category.all') }}">Crime Category All</a>
            </li>
            <li class="active">
                <strong>Crime Category Update</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-6">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('crime.category.all') }}"><i class="fa fa-arrow-left"></i> Crime Category List</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Crime Category</h2>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('crime.category.update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <input type="hidden" name="crime_category_id" value="{{ $crime_category->crime_category_id }}">
                    <div class="form-group @if($errors->has('crime_type_id')) has-error @endif">
                        <label for="crime_type_id">Crime Type: </label>
                        <select class="form-control" name="crime_type_id">
                            <option value="">-Select-</option>
                            @foreach($crime_types as $crime_type)
                                <option value="{{ $crime_type->crime_type_id }}" @if($crime_type->crime_type_id == old('crime_type_id', $crime_category->crime_type_id)) selected @endif>{{ $crime_type->crime_type_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('crime_type_id'))
                        <span class="help-block">{{ $errors->first('crime_type_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('crime_category_name')) has-error @endif">
                        <label for="crime_category_name">Crime Category Name: </label>
                        <input type="text" id="crime_category_name" name="crime_category_name" class="form-control" value="{{ old('crime_category_name', $crime_category->crime_category_name) }}">
                        @if($errors->has('crime_category_name'))
                        <span class="help-block">{{ $errors->first('crime_category_name') }}</span>
                        @endif
                    </div>

                    
                    <div class="form-group">
                        <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-success btn-lg" data-backdrop="static" data-keyboard="false">Update Crime Category</button>
                        <br />
                        <!-- Modal -->
                        <div class="modal fade" id="submit-case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Action: Update Crime Category</h4>
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