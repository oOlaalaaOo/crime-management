@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Stations</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}"><strong>Cases</strong></a>
            </li>
            <li class="active">
                <strong>Stations</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-warning" href="{{ route('stations.add.view') }}"><i class="fa fa-plus"></i> Add</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Stations</h2>
                </div>
                <div class="ibox-content">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Station</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stations as $station)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $station->station }}</td>
                                <td>{{ $station->description }}</td>
                                <td>
                                    <a href="{{ route('stations.show', ['police_station_id' => $station->police_station_id]) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a> <a href="#" class="btn btn-xs btn-default"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                </table>
                {{ $stations->links() }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection