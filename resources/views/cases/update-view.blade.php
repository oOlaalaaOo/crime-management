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
            <a class="btn btn-warning" href="{{ route('case.all') }}"><i class="fa fa-arrow-left"></i> Case List</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Case: <small>all fields with * is required</small></h2></div>
                    <div class="ibox-content">
                        <form action="{{ route('case.update') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="crime_location_id" value="{{ $case->crime_location_id }}">
                            <input type="hidden" name="offense_id" value="{{ $case->offense_id }}">
                            <input type="hidden" name="case_detail_id" value="{{ $case->case_detail_id }}">
                            <input type="hidden" name="case_blotter_id" value="{{ $case->case_blotter_id }}">
                            <input type="hidden" name="case_status" value="{{ $case->case_status }}">
                            <input type="hidden" name="case_id" value="{{ $case->case_id }}">
                            <div id="adding-case">
                                
                            <div class="row" id="step-2">
                                <div class="col-xs-12">
                                    <h2>Case Details</h2>
                                    <hr>
                                </div>
                                <div class="col-xs-5">
                                    <div class="">
                                        
                                        <div class="form-group @if($errors->has('crime_classification')) has-error @endif">
                                            <label for="crime_classification">Crime Classification</label>
                                            <select class="form-control" name="crime_classification" id="crime_classification">
                                                <option value="">Choose</option>
                                                @foreach($crime_classifications as $data)
                                                <option value="{{ $data->crime_classification_id }}" @if(old('crime_classification', $data->crime_classification_id) == $case->crime_classification_id) selected @endif>{{ $data->crime_classification_name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('crime_classification'))
                                            <span class="help-block">{{ $errors->first('crime_classification') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group @if($errors->has('incident_at')) has-error @endif">
                                            <label for="incident_at">Incident Date</label>
                                            <input type="text" name="incident_at" id="incident_at" class="form-control" placeholder="yyyy-mm-dd" value="{{ old('incident_at', $case->incident_at) }}">
                                            @if($errors->has('incident_at'))
                                            <span class="help-block">{{ $errors->first('incident_at') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-5">
                                    <label>Crime Location</label><br />
                                    <div class="form-group @if($errors->has('region_id')) has-error @endif">
                                        
                                        <select class="form-control" name="region_id" id="region_id">
                                            <option value="">Region</option>
                                            @foreach($regions as $data)
                                            <option value="{{ $data->regCode }}" @if(old('region_id', $case->region_id) == $data->regCode) selected @endif>{{ $data->regDesc }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('region_id'))
                                        <span class="help-block">{{ $errors->first('region_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group @if($errors->has('province_id')) has-error @endif">
                                        
                                        <select class="form-control" name="province_id" id="province_id">
                                            <option value="{{ $case->province_id }}">{{ $case->provDesc }}</option>
                                        </select>
                                        @if($errors->has('province_id'))
                                        <span class="help-block">{{ $errors->first('province_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group @if($errors->has('city_id')) has-error @endif">
                                        
                                        <select class="form-control" name="city_id" id="city_id">
                                            <option value="{{ $case->city_id }}">{{ $case->citymunDesc }}</option>
                                        </select>
                                        @if($errors->has('city_id'))
                                        <span class="help-block">{{ $errors->first('city_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('home_address')) has-error @endif">
                                        <label for="home_address">Address</label>
                                        <input type="text" name="home_address" id="home_address" class="form-control" value="{{ old('home_address', $case->home_address) }}">
                                        @if($errors->has('home_address'))
                                        <span class="help-block">{{ $errors->first('home_address') }}</span>
                                        @endif
                                    </div>
                                        
                                </div>
                            </div>
                                
                            <div class="row" id="step-3">
                                <div class="col-xs-12">
                                    <br />
                                    <h2>Case Blotter</h2>
                                    <hr>
                                </div>
                                <div class="col-xs-8">
                                    <div>
                                        <div class="form-group @if($errors->has('entry_no')) has-error @endif">
                                            <label for="entry_no">Entry No.</label>
                                            <input type="text" class="form-control" name="entry_no" id="entry_no" value="{{ old('entry_no', $case->entry_no) }}">
                                            @if($errors->has('entry_no'))
                                            <span class="help-block">{{ $errors->first('entry_no') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group @if($errors->has('reported_at')) has-error @endif">
                                            <label for="reported_at">Reported Date</label>
                                            <input type="text" class="form-control" name="reported_at" id="reported_at" placeholder="yyyy-mm-dd" value="{{ old('reported_at', $case->reported_at) }}">
                                            @if($errors->has('reported_at'))
                                            <span class="help-block">{{ $errors->first('reported_at') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row" id="step-3">
                                <div class="col-xs-12">
                                    <br />
                                    <h2>Offenses</h2>
                                    <hr>
                                </div>
                                <div class="col-xs-8">
                                    <div class="">
                                        <div class="form-group @if($errors->has('crime_type')) has-error @endif">
                                            <label for="crime_type">Crime Type</label>
                                            <select class="form-control" name="crime_type" id="crime_type">
                                                <option value="">Choose</option>
                                                @foreach($crime_types as $data)
                                                <option value="{{ $data->crime_type_id }}" @if(old('crime_type', $case->crime_type_id) == $data->crime_type_id) selected @endif>{{ $data->crime_type_name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('crime_type'))
                                            <span class="help-block">{{ $errors->first('crime_type') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group @if($errors->has('crime_category')) has-error @endif">
                                            <label for="crime_category">Crime Category</label>
                                            <select class="form-control" name="crime_category" id="crime_category">
                                                <option value="{{ $case->crime_category_id }}">{{ $case->crime_category_name }}</option>
                                                
                                            </select>
                                            @if($errors->has('crime_category'))
                                            <span class="help-block">{{ $errors->first('crime_category') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group @if($errors->has('offense_detail')) has-error @endif">
                                            <label for="offense_detail">Offense Detail</label>
                                            <input type="text" class="form-control" name="offense_detail" id="offense_detail" value="{{ old('offense_detail', $case->detail) }}">
                                            @if($errors->has('offense_detail'))
                                            <span class="help-block">{{ $errors->first('offense_detail') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-4">
                                    <br />
                                    <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-success btn-lg btn-block" data-backdrop="static" data-keyboard="false">Confirm Case Update</button>
                                    <br />
                                    <!-- Modal -->
                                    <div class="modal fade" id="submit-case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Action: Update Case</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Please click submit now to confirm action</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Confirm Changes</button>
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