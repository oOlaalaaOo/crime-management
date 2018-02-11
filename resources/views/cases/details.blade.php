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
            <a class="btn btn-default" href="{{ route('case.all') }}"><i class="fa fa-arrow-left"></i> Case List</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Case Details <span class="pull-right"><a href="{{ route('case.add-crime-view', ['case_id' => $case->case_id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Add Crime</a></span></h3>
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
       
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Victims <a href="{{ route('victim.add.view', ['case_id' => $case->case_id]) }}" class="pull-right btn btn-warning btn-sm"><i class="fa fa-plus"></i> Add Victim</a></h2>
                </div>
                <div class="ibox-content">
                    
                    <div class="list-group">
                       @foreach($victims as $data)
                      <a href="{{ route('victim.update.view', ['victim_id' => $data->victim_id, 'case_id' => $case->case_id]) }}" class="list-group-item"> - {{ $data->first_name . ' ' . $data->mid_name . ' ' . $data->last_name }}<span class="label label-dark pull-right">{{ $data->victim_status}}</span></a>
                       @endforeach
                    </div>

                </div>
            </div>

        </div>

        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Suspects <a href="{{ route('suspect.add.view', ['case_id' => $case->case_id]) }}" class="pull-right btn btn-warning btn-sm"><i class="fa fa-plus"></i> Add Suspect</a></h2>
                </div>
                <div class="ibox-content">
                    
                    <div class="list-group">
                       @foreach($suspects as $data)
                      <a href="{{ route('suspect.update.view', ['suspect_id' => $data->suspect_id, 'case_id' => $case->case_id]) }}" class="list-group-item"> - {{ $data->first_name . ' ' . $data->mid_name . ' ' . $data->last_name }}<span class="label label-dark pull-right">{{ $data->suspect_status}}</span></a>
                       @endforeach
                    </div>

                </div>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Case Files <span class="pull-right"><a href="{{ route('case.files.add.view', ['case_id' => $case->case_id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Add Files</a></span></h2>
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
        
        {{-- <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Map</h2>
                </div>
                <div class="ibox-content">
                    <div id="map" style="width:100%;height:400px;">
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
@section('more_scripts')
    {{-- <script>
    function myMap() {

        var lat = '{{ $case->crime_coordinate_lat }}';
        var lng = '{{ $case->crime_coordinate_long }}';
        // console.log(lat + ' ' + lng);
        var mapProp= {
            center:new google.maps.LatLng(lat,lng),
            zoom:18,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("map"), mapProp);
        var marker = new google.maps.Marker({
            position: mapProp.center,
            animation: google.maps.Animation.BOUNCE
        });
        marker.setMap(map);
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4g5tTbLP8pq1P6W0VtAc7TY8bMcc3Mm0&callback=myMap"></script> --}}
    
@endsection