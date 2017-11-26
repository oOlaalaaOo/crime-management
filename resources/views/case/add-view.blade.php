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
            <a class="btn btn-warning" href="{{ route('home') }}"><i class="fa fa-arrow-left"></i> Case List</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Case List</h5>
                    <div class="ibox-content">
                        <form action="{{ route('case.add') }}" method="post">
                            {{ csrf_field() }}
                            <div id="adding-case">
                                <div class="row" id="step-1">
                                    <div class="col-xs-12">
                                        <h4 class="text-center">Involved Persons</h4>
                                        <br />
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="well">
                                            <h4>Victim Details</h4>
                                            <hr>
                                            <div class="form-group @if($errors->has('victim_name')) has-error @endif">
                                                <label for="victim_name">Full Name: </label>
                                                <input type="text" id="victim_name" name="victim_name" class="form-control" value="{{ old('victim_name') }}">
                                                @if($errors->has('victim_name'))
                                                <span class="help-block">{{ $errors->first('victim_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('victim_address')) has-error @endif">
                                                <label for="victim_address">Full Address: </label>
                                                <input type="text" id="victim_address" name="victim_address" class="form-control" value="{{ old('victim_address') }}">
                                                @if($errors->has('victim_address'))
                                                <span class="help-block">{{ $errors->first('victim_address') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('victim_occupation')) has-error @endif">
                                                <label for="victim_occupation">Occupation: </label>
                                                <input type="text" id="victim_occupation" name="victim_occupation" class="form-control" value="{{ old('victim_occupation') }}">
                                                @if($errors->has('victim_occupation'))
                                                <span class="help-block">{{ $errors->first('victim_occupation') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('victim_birth_date')) has-error @endif">
                                                <label for="victim_birth_date">Birth Date: </label>
                                                <input type="text" id="victim_birth_date" name="victim_birth_date" class="form-control" value="{{ old('victim_birth_date') }}" placeholder="yyyy-mm-dd">
                                                @if($errors->has('victim_birth_date'))
                                                <span class="help-block">{{ $errors->first('victim_birth_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="victim_gender" value="male" checked>
                                                        Male
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="victim_gender" value="female">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Civil Status</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="victim_civil_status" value="single" checked>
                                                        Single
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="victim_civil_status" value="married">
                                                        Married
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="victim_civil_status" value="separated">
                                                        Separated
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="victim_civil_status" value="Divorced">
                                                        Divorced
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="victim_civil_status" value="widowed">
                                                        Widowed
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group @if($errors->has('victim_nationality')) has-error @endif">
                                                <label for="victim_nationality">Nationality: </label>
                                                <input type="text" id="victim_nationality" name="victim_nationality" class="form-control" value="{{ old('victim_nationality') }}">
                                                @if($errors->has('victim_nationality'))
                                                <span class="help-block">{{ $errors->first('victim_nationality') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('victim_status')) has-error @endif">
                                                <label for="victim_status">Status: </label>
                                                <input type="text" id="victim_status" name="victim_status" class="form-control" value="{{ old('victim_status') }}">
                                                @if($errors->has('victim_status'))
                                                <span class="help-block">{{ $errors->first('victim_status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="well">
                                            <h4>Suspect Details</h4>
                                            <hr>
                                            <div class="form-group @if($errors->has('suspect_name')) has-error @endif">
                                                <label for="suspect_name">Full Name: </label>
                                                <input type="text" id="suspect_name" name="suspect_name" class="form-control" value="{{ old('suspect_name') }}">
                                                @if($errors->has('suspect_name'))
                                                <span class="help-block">{{ $errors->first('suspect_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('suspect_address')) has-error @endif">
                                                <label for="suspect_address">Full Address: </label>
                                                <input type="text" id="suspect_address" name="suspect_address" class="form-control" value="{{ old('suspect_address') }}">
                                                @if($errors->has('suspect_address'))
                                                <span class="help-block">{{ $errors->first('suspect_address') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('suspect_occupation')) has-error @endif">
                                                <label for="suspect_occupation">Occupation: </label>
                                                <input type="text" id="suspect_occupation" name="suspect_occupation" class="form-control" value="{{ old('suspect_occupation') }}">
                                                @if($errors->has('suspect_occupation'))
                                                <span class="help-block">{{ $errors->first('suspect_occupation') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('suspect_birth_date')) has-error @endif">
                                                <label for="suspect_birth_date">Birth Date: </label>
                                                <input type="text" id="suspect_birth_date" name="suspect_birth_date" class="form-control" value="{{ old('suspect_birth_date') }}" placeholder="yyyy-mm-dd">
                                                @if($errors->has('suspect_birth_date'))
                                                <span class="help-block">{{ $errors->first('suspect_birth_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="suspect_gender" value="male" checked>
                                                        Male
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="suspect_gender" value="female">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Civil Status</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="suspect_civil_status" value="single" checked>
                                                        Single
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="suspect_civil_status" value="married">
                                                        Married
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="suspect_civil_status" value="separated">
                                                        Separated
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="suspect_civil_status" value="Divorced">
                                                        Divorced
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="suspect_civil_status" value="widowed">
                                                        Widowed
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group @if($errors->has('suspect_nationality')) has-error @endif">
                                                <label for="suspect_nationality">Nationality: </label>
                                                <input type="text" id="suspect_nationality" name="suspect_nationality" class="form-control" value="{{ old('suspect_nationality') }}">
                                                @if($errors->has('suspect_nationality'))
                                                <span class="help-block">{{ $errors->first('suspect_nationality') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('suspect_status')) has-error @endif">
                                                <label for="suspect_status">Status: </label>
                                                <input type="text" id="suspect_status" name="suspect_status" class="form-control" value="{{ old('suspect_status') }}">
                                                @if($errors->has('suspect_status'))
                                                <span class="help-block">{{ $errors->first('suspect_status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-4">
                                        <hr>
                                        {{-- <button class="btn btn-default btn-block" type="button" id="go-to-step-2">Next</button>
                                        <button class="btn btn-default btn-block" type="button" id="go-to-step-1">Go Back</button> --}}
                                        <h4 class="text-center">Case Details</h4>
                                        <br />
                                    </div>
                                </div>
                                
                                <div class="row" id="step-2">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="well">
                                            <div class="form-group @if($errors->has('crime_classification')) has-error @endif">
                                                <label for="crime_classification">Crime Classification</label>
                                                <select class="form-control" name="crime_classification" id="crime_classification">
                                                    <option value="">Choose</option>
                                                    @foreach($crime_classifications as $data)
                                                    <option value="{{ $data->crime_classification_id }}">{{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('crime_classification'))
                                                <span class="help-block">{{ $errors->first('crime_classification') }}</span>
                                                @endif
                                            </div>
                                            <label>Crime Location</label><br />
                                            <div class="form-group @if($errors->has('region_id')) has-error @endif">
                                                <label>Region</label>
                                                <select class="form-control" name="region_id" id="region_id">
                                                    <option value="">Choose</option>
                                                    @foreach($regions as $data)
                                                    <option value="{{ $data->regCode }}">{{ $data->regDesc }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('region_id'))
                                                <span class="help-block">{{ $errors->first('region_id') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('province_id')) has-error @endif">
                                                <label>Province</label>
                                                <select class="form-control" name="province_id" id="province_id">
                                                    <option value="">Choose</option>
                                                </select>
                                                @if($errors->has('province_id'))
                                                <span class="help-block">{{ $errors->first('province_id') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('city_id')) has-error @endif">
                                                <label>City</label>
                                                <select class="form-control" name="city_id" id="city_id">
                                                    <option value="">Choose</option>
                                                </select>
                                                @if($errors->has('city_id'))
                                                <span class="help-block">{{ $errors->first('city_id') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('home_address')) has-error @endif">
                                                <label for="home_address">Address</label>
                                                <input type="text" name="home_address" id="home_address" class="form-control" value="{{ old('home_address') }}">
                                                @if($errors->has('home_address'))
                                                <span class="help-block">{{ $errors->first('home_address') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group @if($errors->has('incident_at')) has-error @endif">
                                                <label for="incident_at">Incident Date</label>
                                                <input type="text" name="incident_at" id="incident_at" class="form-control" placeholder="yyyy-mm-dd" value="{{ old('incident_at') }}">
                                                @if($errors->has('incident_at'))
                                                <span class="help-block">{{ $errors->first('incident_at') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-4">
                                        <hr>
                                        {{-- <button class="btn btn-default btn-block" type="button" id="go-to-step-2">Next</button>
                                        <button class="btn btn-default btn-block" type="button" id="go-to-step-1">Go Back</button> --}}
                                        <h4 class="text-center">Case Blotter</h4>
                                        <br />
                                    </div>
                                </div>
                                <div class="row" id="step-3">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="well">
                                            <div class="form-group @if($errors->has('entry_no')) has-error @endif">
                                                <label for="entry_no">Entry No.</label>
                                                <input type="text" class="form-control" name="entry_no" id="entry_no" value="{{ old('entry_no') }}">
                                                @if($errors->has('entry_no'))
                                                <span class="help-block">{{ $errors->first('entry_no') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('reported_at')) has-error @endif">
                                                <label for="reported_at">Reported Date</label>
                                                <input type="text" class="form-control" name="reported_at" id="reported_at" placeholder="yyyy-mm-dd" value="{{ old('reported_at') }}">
                                                @if($errors->has('reported_at'))
                                                <span class="help-block">{{ $errors->first('reported_at') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-4">
                                        <hr>
                                        {{-- <button class="btn btn-default btn-block" type="button" id="go-to-step-2">Next</button>
                                        <button class="btn btn-default btn-block" type="button" id="go-to-step-1">Go Back</button> --}}
                                        <h4 class="text-center">Offenses</h4>
                                        <br />
                                    </div>
                                </div>
                                <div class="row" id="step-3">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <div class="well">
                                            <div class="form-group @if($errors->has('crime_type')) has-error @endif">
                                                <label for="crime_type">Crime Type</label>
                                                <select class="form-control" name="crime_type" id="crime_type">
                                                    <option value="">Choose</option>
                                                    @foreach($crime_types as $data)
                                                    <option value="{{ $data->crime_type_id }}">{{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('crime_type'))
                                                <span class="help-block">{{ $errors->first('crime_type') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('crime_category')) has-error @endif">
                                                <label for="crime_category">Crime Category</label>
                                                <select class="form-control" name="crime_category" id="crime_category">
                                                    <option value="">Choose</option>
                                                    
                                                </select>
                                                @if($errors->has('crime_category'))
                                                <span class="help-block">{{ $errors->first('crime_category') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if($errors->has('offense_detail')) has-error @endif">
                                                <label for="offense_detail">Offense Detail</label>
                                                <textarea class="form-control" name="offense_detail" id="offense_detail">
                                                {{ old('offense_detail') }}
                                                </textarea>
                                                @if($errors->has('offense_detail'))
                                                <span class="help-block">{{ $errors->first('offense_detail') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-4">
                                        <hr>
                                        <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-info btn-lg btn-block" data-backdrop="static" data-keyboard="false">Submit New Case</button>
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
                                                        <label>Please click submit now to confirm adding new case</label>
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
