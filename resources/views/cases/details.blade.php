@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Case</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('case.all') }}">Case List</a>
            </li>
            <li class="active">
                <strong>Case Details</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            @if(Auth::user()->user_type_id != 1)
            <a class="btn btn-default" href="{{ route('case.all') }}"><i class="fa fa-arrow-left"></i> Back</a>
            @else
            <a class="btn btn-default" href="{{ route('home') }}"><i class="fa fa-arrow-left"></i> Back</a>
            @endif
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
                            <h3>Case Details</h3>
                        </div>
                        <div class="col-xs-6 text-right">
                            @if(Auth::user()->user_type_id == 2)
                            <a href="{{ route('case.add-crime-view', ['case_id' => $case->case_id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Add Crime</a>
                            @endif
                        </div>
                    </div>
                    
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="width: 15%; border: 0px"><strong>Created Date:</strong></td>
                                <td style="border: 0px">{{ date('F d, Y H:i:s', strtotime($case->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 15%; border: 0px"><strong>Case Status:</strong></td>
                                <td style="border: 0px">{{ ucfirst($case->case_status) }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Offense</th>
                                <th>Classification</th>
                                <th>Location</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($case_details as $cd)
                            <tr>
                                <td><strong>{{ $loop->index + 1 }}</strong></td>
                                <td>{{ $cd->crime_type_name }}</td>
                                <td>{{ $cd->crime_category_name }}</td>
                                <td>{{ $cd->offense_name }}</td>
                                <td>{{ $cd->crime_classification_name }}</td>
                                <td>{{ $cd->home_address }}</td>
                                <td><a target="_blank" href="{{ route('mapp', ['case_id' => $cd->case_detail_id]) }}" class="btn btn-xs btn-default"><i class="fa fa-map-marker"></i> See Map</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Victims</h2>
                        </div>
                        <div class="col-xs-6 text-right">
                             @if(Auth::user()->user_type_id == 2)
                            <a href="{{ route('victim.add.view', ['case_id' => $case->case_id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Add Victim</a>
                            @endif
                        </div>
                    </div>
                    
                </div>
                <div class="ibox-content">
                    
                    <div class="list-group">
                       @foreach($victims as $data)
                      <a href="@if(Auth::user()->user_type_id == 2){{ route('victim.update.view', ['victim_id' => $data->victim_id, 'case_id' => $case->case_id]) }} @else # @endif" class="list-group-item"> - {{ $data->first_name . ' ' . $data->mid_name . ' ' . $data->last_name }}<span class="label label-dark pull-right">{{ $data->victim_status}}</span></a>
                       @endforeach
                    </div>

                </div>
            </div>

        </div>

        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Suspects</h2>
                        </div>
                        <div class="col-xs-6 text-right">
                             @if(Auth::user()->user_type_id == 2)
                            <a href="{{ route('suspect.add.view', ['case_id' => $case->case_id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Add Suspect</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    
                    <div class="list-group">
                       @foreach($suspects as $data)
                      <a href="@if(Auth::user()->user_type_id == 2){{ route('suspect.update.view', ['suspect_id' => $data->suspect_id, 'case_id' => $case->case_id]) }} @else # @endif" class="list-group-item"> - {{ $data->first_name . ' ' . $data->mid_name . ' ' . $data->last_name }}<span class="label label-dark pull-right">{{ $data->suspect_status}}</span></a>
                       @endforeach
                    </div>

                </div>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Case Files</h2>
                        </div>

                        <div class="col-xs-6 text-right">
                            @if(Auth::user()->user_type_id == 2)
                            <a href="{{ route('case.files.add.view', ['case_id' => $case->case_id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Add Files</a>
                            @endif
                        </div>
                    </div>
                    
                </div>
                <div class="ibox-content">
                    <div class="slick_demo_2">
                        @foreach($case_files as $case_file)
                        <div>
                            <div class="ibox-content">
                                <img src="{{ URL::asset('case-files/' . $case->case_id . '/'. $case_file->case_image) }}" class="img-responsive">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
