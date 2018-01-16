@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Dashboard</strong>
            </li>
            {{-- <li class="active">
                <strong>Breadcrumb</strong>
            </li> --}}
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-warning" href="{{ route('case.add.view') }}"><i class="fa fa-plus"></i> Add Case</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-xs-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Case List</h2>
                </div>
                <div class="ibox-content">
                    <h3>Your Total Case: {{ $total_case }}</h3>
                    <hr>
                    @if(count($user_cases) > 0)
                    @foreach($user_cases as $data)
                    <div class="list-group">
                        <a href="{{ route('case.details', ['case_id' => $data->case_id]) }}" class="list-group-item">
                            <h4 class="list-group-item-heading">Case No: <span class="badge">{{ $data->case_no }}</span></h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Crime Type:</td>
                                        <td><strong>{{ $data->crime_type }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Crime Category:</td>
                                        <td><strong>{{ $data->crime_category }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Crime Classification:</td>
                                        <td><strong>{{ $data->crime_classification }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Incident Date:</td>
                                        <td><strong>{{ date('F d, Y', strtotime($data->incident_at)) }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </a>
                    </div>
                    @endforeach
                    <div class="text-right"> 
                        {{ $user_cases->links() }}
                    </div>
                    @else
                    <h3>You don't have case yet..</h3>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Latest Case</h3>
                </div>
                <div class="ibox-content">
                    @if(count($latest_cases) > 0)
                    @foreach($latest_cases as $data)
                    <a href="#" class="list-group-item">
                        Case No: {{ $data->case_unique_no }}
                        <span class="badge">{{ $data->user_name }}</span>
                    </a>
                    @endforeach
                    
                    @else
                    <h3>No Case at all..</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
