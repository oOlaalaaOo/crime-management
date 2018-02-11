@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Blotter</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('home') }}">Case List</a>
            </li>
            <li class="active">
                <a href="{{ route('blotter.all') }}">Blotter List</a>
            </li>
            <li class="active">
                <strong>Blotter Update</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('blotter.all') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3>Blotter</h3>
                        </div>
                        <div class="col-xs-6">

                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('blotter.update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="blotter_id" value="{{ $blotter->blotter_id }}">
                    <div class="form-group @if($errors->has('title')) has-error @endif">
                        <label for="title">Title: </label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $blotter->blotter_title) }}">
                        @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('content')) has-error @endif">
                        <label for="content">Content: </label>
                        <textarea class="form-control" name="content" id="content">{{ old('content', $blotter->blotter_content) }}</textarea>
                        @if($errors->has('content'))
                        <span class="help-block">{{ $errors->first('content') }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('complainant_name')) has-error @endif">
                        <label for="complainant_name">Complainant Name: </label>
                        <input type="text" id="complainant_name" name="complainant_name" class="form-control" value="{{ old('complainant_name', $blotter->complainant_name) }}">
                        @if($errors->has('complainant_name'))
                        <span class="help-block">{{ $errors->first('complainant_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('complainant_address')) has-error @endif">
                        <label for="complainant_address">complainant_address: </label>
                        <input type="text" id="complainant_address" name="complainant_address" class="form-control" value="{{ old('complainant_address', $blotter->complainant_address) }}">
                        @if($errors->has('complainant_address'))
                        <span class="help-block">{{ $errors->first('complainant_address') }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('complainant_contact_no')) has-error @endif">
                        <label for="complainant_contact_no">Complainant Contact No.: </label>
                        <input type="text" id="complainant_contact_no" name="complainant_contact_no" class="form-control" value="{{ old('complainant_contact_no', $blotter->complainant_contact_no) }}">
                        @if($errors->has('complainant_contact_no'))
                        <span class="help-block">{{ $errors->first('complainant_contact_no') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-success btn-lg" data-backdrop="static" data-keyboard="false">Update Blotter</button>
                        <br />
                        <!-- Modal -->
                        <div class="modal fade" id="submit-case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Action: Update</h4>
                                    </div>
                                    <div class="modal-body">
                                        <label>Please click submit now to confirm action</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit Now</button>
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