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
                <strong>Case Details-Full</strong>
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
                            <h2>Case Details</h2>
                        </div>
                        <div class="col-xs-6 text-right">
                           
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
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Victims</h2>
                        </div>
                        <div class="col-xs-6 text-right">
                           
                            
                        </div>
                    </div>
                    
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Contact No.</th>
                                <th>Address</th>
                                <th>Occupation</th>
                                <th>BirthDate</th>
                                <th>Sex</th>
                                <th>Civil Status</th>
                                <th>Nationality</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($victims as $data)
                            <tr>
                                <td><strong>{{ $loop->index + 1 }}</strong></td>
                                <td>{{ $data->first_name . ' ' . $data->mid_name . ' ' . $data->last_name }}</td>
                                <td>{{ $data->contact_no }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->occupation }}</td>
                                <td>{{ $data->birth_date }}</td>
                                <td>{{ $data->sex }}</td>
                                <td>{{ $data->civil_status }}</td>
                                <td>{{ $data->nationality }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   

                </div>
            </div>

        </div>

        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Suspects</h2>
                        </div>
                        <div class="col-xs-6 text-right">
                           
                            
                        </div>
                    </div>
                    
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Contact No.</th>
                                <th>Address</th>
                                <th>Occupation</th>
                                <th>BirthDate</th>
                                <th>Sex</th>
                                <th>Civil Status</th>
                                <th>Nationality</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suspects as $data)
                            <tr>
                                <td><strong>{{ $loop->index + 1 }}</strong></td>
                                <td>{{ $data->first_name . ' ' . $data->mid_name . ' ' . $data->last_name }}</td>
                                <td>{{ $data->contact_no }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->occupation }}</td>
                                <td>{{ $data->birth_date }}</td>
                                <td>{{ $data->sex }}</td>
                                <td>{{ $data->civil_status }}</td>
                                <td>{{ $data->nationality }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   

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
