@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Suspect Add</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="active">
                <a href="{{ route('suspect.all') }}">Suspect All</a>
            </li>
            <li class="active">
                <strong>Suspect Add</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('case.details', ['case_id' => $case_id]) }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Suspect Details</h2>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('suspect.add.exist') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="case_id" value="{{ $case_id }}">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group @if($errors->has('suspect_id')) has-error @endif"">
                                    <h2>Is suspect already exist?</h2><br />
                                    <label>Search Suspect</label>
                                    <select name="suspect_id" data-placeholder="Select Suspect.." class="chosen-select">
                                        <option value="">-Select Suspect Here-</option>
                                        @foreach ($suspects as $suspect)
                                            <option value="{{ $suspect->suspect_id }}">{{ $suspect->first_name . ' ' . $suspect->mid_name . ' ' . $suspect->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('suspect_id'))
                                    <span class="help-block">{{ $errors->first('suspect_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('suspect_status')) has-error @endif">
                                    <label for="suspect_status">Status: </label>
                                    <input type="text" id="suspect_status" name="suspect_status" class="form-control input-sm" value="{{ old('suspect_status') }}">
                                    @if($errors->has('suspect_status'))
                                    <span class="help-block">{{ $errors->first('suspect_status') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="button" data-toggle="modal" data-target="#submit-case1" class="btn btn-success btn-lg" data-backdrop="static" data-keyboard="false">Add Suspect</button>
                                    <br />
                                    <br />
                                    <!-- Modal -->
                                    <div class="modal fade" id="submit-case1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Action: Add Suspect</h4>
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
                            </div>
                        </div>
                        
                    </form>

                    <form action="{{ route('suspect.add') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="case_id" value="{{ $case_id }}">
                    <div class="form-group">
                        <h2>Specify the suspect details here if its new</h2>
                        <br />
                        <img src="{{ URL::asset('assets/img/default-user.jpg') }}" class="img-thumbnail" width="250" height="250" id="photoPreview"><br /><br />
                        <input type="file" name="photoFile" id="photoFile">
                        <br />
                    </div>
                    <div class="form-group @if($errors->has('first_name')) has-error @endif">
                        <label for="first_name">First Name: </label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}">
                        @if($errors->has('first_name'))
                        <span class="help-block">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('mid_name')) has-error @endif">
                        <label for="mid_name">Mid Name: </label>
                        <input type="text" id="mid_name" name="mid_name" class="form-control" value="{{ old('mid_name') }}">
                        @if($errors->has('mid_name'))
                        <span class="help-block">{{ $errors->first('mid_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('last_name')) has-error @endif">
                        <label for="last_name">Last Name: </label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}">
                        @if($errors->has('last_name'))
                        <span class="help-block">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                        <label for="address">Full Address: </label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}">
                        @if($errors->has('address'))
                        <span class="help-block">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('occupation')) has-error @endif">
                        <label for="occupation">Occupation: </label>
                        <input type="text" id="occupation" name="occupation" class="form-control" value="{{ old('occupation') }}">
                        @if($errors->has('occupation'))
                        <span class="help-block">{{ $errors->first('occupation') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('birth_date')) has-error @endif">
                        <label for="birth_date">Birth Date: </label>
                        <input type="text" id="birth_date" name="birth_date" class="form-control" value="{{ old('birth_date') }}" placeholder="yyyy-mm-dd">
                        @if($errors->has('birth_date'))
                        <span class="help-block">{{ $errors->first('birth_date') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" value="male" checked>
                                Male
                            </label>
                            <label>
                                <input type="radio" name="gender" value="female">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Civil Status</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="civil_status" value="single" checked>
                                Single
                            </label>
                            <label>
                                <input type="radio" name="civil_status" value="married">
                                Married
                            </label>
                            <label>
                                <input type="radio" name="civil_status" value="separated">
                                Separated
                            </label>
                            <label>
                                <input type="radio" name="civil_status" value="Divorced">
                                Divorced
                            </label>
                            <label>
                                <input type="radio" name="civil_status" value="widowed">
                                Widowed
                            </label>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('nationality')) has-error @endif">
                        <label for="nationality">Nationality: </label>
                        <input type="text" id="nationality" name="nationality" class="form-control" value="{{ old('nationality') }}">
                        @if($errors->has('nationality'))
                        <span class="help-block">{{ $errors->first('nationality') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('status')) has-error @endif">
                        <label for="status">Status: </label>
                        <input type="text" id="status" name="status" class="form-control" value="{{ old('status') }}">
                        @if($errors->has('status'))
                        <span class="help-block">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-success btn-lg" data-backdrop="static" data-keyboard="false">Add New Suspect</button>
                                    <br />
                                    <!-- Modal -->
                                    <div class="modal fade" id="submit-case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Action: Add Suspect</h4>
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