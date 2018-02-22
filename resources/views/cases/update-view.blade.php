@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Case</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('case.all') }}">Case List</a>
            </li>
            <li class="active">
                <strong>Case Update</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('case.details', ['case_id' => $case->case_id]) }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                @if(session()->has('unknown_address'))
                    <div class="alert alert-success" role="alert">{{ session()->get('unknown_address') }}</div>
                @endif
                <div class="ibox-title">
                    <h2>Case: <small>all fields with * is required</small></h2></div>
                    <div class="ibox-content">
                        <form action="{{ route('case.update') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="case_id" value="{{ $case->case_id }}">
                            <input type="hidden" name="crime_location_id" value="{{ $case->crime_location_id }}">
                            <input type="hidden" name="case_detail_id" value="{{ $case->case_detail_id }}">
                            <input type="hidden" name="crime_coordinate_id" value="{{ $case->crime_coordinate_id }}">
                            
                            <div id="adding-case">
                                
                            <div class="row" id="step-2">
                                
                                <div class="col-xs-6">
                                    
                                    <div class="form-group @if($errors->has('crime_type')) has-error @endif">
                                        <label for="crime_type">Crime Type</label>
                                        <select class="form-control" name="crime_type" id="crime_type">
                                            <option value="{{ $case->crime_type_id }}">{{$case->crime_type_name}}</option>
                                            @foreach($crime_types as $data)
                                            <option value="{{ $data->crime_type_id }}">{{ $data->crime_type_name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('crime_type'))
                                        <span class="help-block">{{ $errors->first('crime_type') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group @if($errors->has('crime_category')) has-error @endif">
                                        <label for="crime_category">Crime Category</label>
                                        <select class="form-control" name="crime_category" id="crime_category">
                                            <option value="{{ $case->crime_category_id }}">{{$case->crime_category_name}}</option>
                                            
                                        </select>
                                        @if($errors->has('crime_category'))
                                        <span class="help-block">{{ $errors->first('crime_category') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group @if($errors->has('offense')) has-error @endif">
                                        <label for="offense">Offense</label>
                                        <select class="form-control" name="offense" id="offense">
                                            <option value="{{ $case->offense_id }}">{{$case->offense_name}}</option>
                                            
                                        </select>
                                        @if($errors->has('offense'))
                                        <span class="help-block">{{ $errors->first('offense') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('crime_classification')) has-error @endif">
                                        <label for="crime_classification">Crime Classification</label>
                                        <select class="form-control" name="crime_classification" id="crime_classification">
                                            <option value="{{ $case->crime_classification_id }}">{{$case->crime_classification_name}}</option>
                                            @foreach($crime_classifications as $data)
                                            <option value="{{ $data->crime_classification_id }}">{{ $data->crime_classification_name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('crime_classification'))
                                        <span class="help-block">{{ $errors->first('crime_classification') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="form-group" id="data_1">
                                        <label class="font-normal">Incident Date</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="incident_at" id="incident_at" class="form-control" placeholder="yyyy-mm-dd" value="{{ old('incident_at', $case->incident_at) }}">

                                        </div>
                                        <span class="help-block">{{ $errors->first('incident_at') }}</span>
                                    </div>

                                    <div class="form-group @if($errors->has('home_address')) has-error @endif">
                                        <label for="home_address">Address</label>
                                        <textarea class="form-control" name="home_address" id="home_address"> {{ old('home_address', $case->home_address) }}</textarea>
                                        
                                        @if($errors->has('home_address'))
                                        <span class="help-block">{{ $errors->first('home_address') }}</span>
                                        @endif
                                    </div>
                                    
                                    <h4>Coordinates</h4>

                                    <div class="form-group @if($errors->has('lat')) has-error @endif">
                                        <label for="lat">Latitude</label>
                                        <input type="text" class="form-control" name="lat" id="lat" value="{{ old('lat', $case->crime_coordinate_lat) }}" />
                                        
                                        @if($errors->has('lat'))
                                        <span class="help-block">{{ $errors->first('lat') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('long')) has-error @endif">
                                        <label for="long">Longitude</label>
                                        <input type="text" class="form-control" name="long" id="long" value="{{ old('long', $case->crime_coordinate_long) }}" />
                                        
                                        @if($errors->has('long'))
                                        <span class="help-block">{{ $errors->first('long') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-4">
                                    <br />
                                    <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-success btn-lg btn-block" data-backdrop="static" data-keyboard="false">Submit Case Update</button>
                                    <br />
                                    <!-- Modal -->
                                    <div class="modal fade" id="submit-case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Please click submit now to confirm updating case</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Submit Now</button>
                                                </div>
                                            </div>
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
</div>
@endsection