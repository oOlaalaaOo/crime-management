@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="active">
                <a href="{{ route('case.all') }}">Case All</a>
            </li>
            <li class="active">
                <strong>Case No: {{ $case->case_unique_no }}</strong>
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
        <div class="col-sm-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Case Details <span class="pull-right"><a href="{{ route('case.files.add.view', ['case_id' => $case->case_id]) }}" class="btn btn-warning"><i class="fa fa-plus"></i> Add Case Files</a></span></h2></div>
                    <div class="ibox-content">
      
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 25%; border: 0px" class="text-right"><strong>Crime Classification:</strong></td>
                                    <td style="border: 0px">{{ $case->crime_classification_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; border: 0px" class="text-right"><strong>Incedent Date:</strong></td>
                                    <td style="border: 0px">{{ $case->incident_at }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; border: 0px" class="text-right"><strong>Crime Location:</strong></td>
                                    <td style="border: 0px">{{ $case->regDesc . ', ' . $case->provDesc . ', ' . $case->citymunDesc . ', ' . $case->home_address }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; border: 0px" class="text-right"><strong>Entry No:</strong></td>
                                    <td style="border: 0px">{{ $case->entry_no }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; border: 0px" class="text-right"><strong>Reported Date:</strong></td>
                                    <td style="border: 0px">{{ $case->reported_at }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; border: 0px" class="text-right"><strong>Crime Type:</strong></td>
                                    <td style="border: 0px">{{ $case->crime_type_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%; border: 0px" class="text-right"><strong>Offense Detail:</strong></td>
                                    <td style="border: 0px">{{ $case->detail }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>

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

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Map</h2>
                </div>
                <div class="ibox-content">
                    <div id="map" style="width:100%;height:400px;">
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Victims <a href="{{ route('victim.add.view', ['case_id' => $case->case_id]) }}" class="pull-right btn btn-warning btn-sm"><i class="fa fa-plus"></i></a></h2>
                </div>
                <div class="ibox-content">
                    
                    <div class="list-group">
                       @foreach($victims as $data)
                      <a href="{{ route('victim.update.view', ['victim_id' => $data->victim_id, 'case_id' => $case->case_id]) }}" class="list-group-item"> - {{ $data->first_name . ' ' . $data->mid_name . ' ' . $data->last_name }}<span class="label label-dark pull-right">{{ $data->victim_status}}</span></a>
                       @endforeach
                    </div>

                </div>
            </div>

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Suspects <a href="{{ route('suspect.add.view', ['case_id' => $case->case_id]) }}" class="pull-right btn btn-warning btn-sm"><i class="fa fa-plus"></i></a></h2>
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
    </div>
</div>
@endsection
@section('more_scripts')
    <script>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4g5tTbLP8pq1P6W0VtAc7TY8bMcc3Mm0&callback=myMap"></script>
    
@endsection