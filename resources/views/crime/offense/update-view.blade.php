@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-6">
        <h2>Offense Add</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="active">
                <a href="{{ route('crime.category.all') }}">Offense All</a>
            </li>
            <li class="active">
                <strong>Offense Add</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-6">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('crime.category.all') }}"><i class="fa fa-arrow-left"></i> Offense List</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Offense</h2>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('crime.offense.add') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="offense_id" value="{{ $offense->offense_id }}">

                    <div class="form-group @if($errors->has('crime_category_id')) has-error @endif">
                        <label for="crime_category_id">Crime Category: </label>
                        <select class="form-control" name="crime_category_id">
                            @foreach($crime_categories as $crime_category)
                                <option value="{{ $crime_category->crime_category_id }}" @if($crime_category->crime_category_id == old('crime_category_id', $offense->crime_category_id)) selected @endif>{{ $crime_category->crime_category_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('crime_category_id'))
                        <span class="help-block">{{ $errors->first('crime_category_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('offense_name')) has-error @endif">
                        <label for="offense_name">Offense Name: </label>
                        <input type="text" id="offense_name" name="offense_name" class="form-control" value="{{ old('offense_name', $offense->offense_name) }}">
                        @if($errors->has('offense_name'))
                        <span class="help-block">{{ $errors->first('offense_name') }}</span>
                        @endif
                    </div>

                    
                    <div class="form-group">
                        <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-success btn-lg" data-backdrop="static" data-keyboard="false">Update Offense</button>
                        <br />
                        <!-- Modal -->
                        <div class="modal fade" id="submit-case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Action: Update Offense</h4>
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