@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Victim Update</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="active">
                <a href="{{ route('victim.all') }}">Victim All</a>
            </li>
            <li class="active">
                <strong>Victim Update</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('victim.all') }}"><i class="fa fa-arrow-left"></i> Victim All</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Victim Details</h2>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('victim.update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="victim_id" value="{{ $victim_id }}">
                        <input type="hidden" name="victim_file_id" value="{{ $file->victim_file_id }}">
                    <div class="form-group">
                        @if($file->vf_filepath != null)
                        
                        <img src="{{ URL::asset('victim-files/'.$victim_id.'/'.$file->vf_filepath) }}" class="img-thumbnail" width="300" height="300" id="photoPreview">
                        @else
                        <img src="{{ URL::asset('assets/img/default-user.jpg') }}" class="img-thumbnail" width="300" height="300" id="photoPreview">
                        @endif
                        <br /><br />
                        <input type="file" name="photoFile" id="photoFile">
                        <br />
                    </div>
                    <div class="form-group @if($errors->has('first_name')) has-error @endif">
                        <label for="first_name">First Name: </label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', $victim->first_name) }}">
                        @if($errors->has('first_name'))
                        <span class="help-block">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('mid_name')) has-error @endif">
                        <label for="mid_name">Mid Name: </label>
                        <input type="text" id="mid_name" name="mid_name" class="form-control" value="{{ old('mid_name', $victim->mid_name) }}">
                        @if($errors->has('mid_name'))
                        <span class="help-block">{{ $errors->first('mid_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('last_name')) has-error @endif">
                        <label for="last_name">Last Name: </label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', $victim->last_name) }}">
                        @if($errors->has('last_name'))
                        <span class="help-block">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('victim_address')) has-error @endif">
                        <label for="victim_address">Full Address: </label>
                        <input type="text" id="victim_address" name="victim_address" class="form-control" value="{{ old('victim_address', $victim->address) }}">
                        @if($errors->has('victim_address'))
                        <span class="help-block">{{ $errors->first('victim_address') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('victim_occupation')) has-error @endif">
                        <label for="victim_occupation">Occupation: </label>
                        <input type="text" id="victim_occupation" name="victim_occupation" class="form-control" value="{{ old('victim_occupation', $victim->occupation) }}">
                        @if($errors->has('victim_occupation'))
                        <span class="help-block">{{ $errors->first('victim_occupation') }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('victim_birth_date')) has-error @endif">
                        <label for="victim_birth_date">Birth Date: </label>
                        <input type="text" id="victim_birth_date" name="victim_birth_date" class="form-control" value="{{ old('victim_birth_date', $victim->birth_date) }}" placeholder="yyyy-mm-dd">
                        @if($errors->has('victim_birth_date'))
                        <span class="help-block">{{ $errors->first('victim_birth_date') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="victim_gender" value="male" @if(old('victim_gender', $victim->gender) == 'male') checked @endif>
                                Male
                            </label>
                            <label>
                                <input type="radio" name="victim_gender" value="female" @if(old('victim_gender', $victim->gender) == 'female') checked @endif>
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Civil Status</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="victim_civil_status" value="single" @if(old('victim_civil_status', $victim->civil_status) == 'single') checked @endif>
                                Single
                            </label>
                            <label>
                                <input type="radio" name="victim_civil_status" value="married" @if(old('victim_civil_status', $victim->civil_status) == 'married') checked @endif>
                                Married
                            </label>
                            <label>
                                <input type="radio" name="victim_civil_status" value="separated" @if(old('victim_civil_status', $victim->civil_status) == 'separated') checked @endif>
                                Separated
                            </label>
                            <label>
                                <input type="radio" name="victim_civil_status" value="divorced" @if(old('victim_civil_status', $victim->civil_status) == 'divorced') checked @endif>
                                Divorced
                            </label>
                            <label>
                                <input type="radio" name="victim_civil_status" value="widowed" @if(old('victim_civil_status', $victim->civil_status) == 'widowed') checked @endif>
                                Widowed
                            </label>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('victim_nationality')) has-error @endif">
                        <label for="victim_nationality">Nationality: </label>
                        <input type="text" id="victim_nationality" name="victim_nationality" class="form-control" value="{{ old('victim_nationality', $victim->nationality) }}">
                        @if($errors->has('victim_nationality'))
                        <span class="help-block">{{ $errors->first('victim_nationality') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="button" data-toggle="modal" data-target="#submit-case" class="btn btn-success btn-lg" data-backdrop="static" data-keyboard="false">Update Victim Details</button>
                                    <br />
                                    <!-- Modal -->
                                    <div class="modal fade" id="submit-case" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Action: Update Victim</h4>
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