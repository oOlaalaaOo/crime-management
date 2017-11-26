@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Cases</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ URL::to('home') }}">Dashboard</a>
            </li>
            <li class="active">
                <strong>Case List</strong>
            </li>
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
        <div class="col-sm-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Case List</h5>
                    <div class="ibox-content">
                        <form action="{{ route('case.search') }}" method="GET">
                            <div class="form-group @if($errors->has('case_no')) has-error @endif">
                                @if($errors->has('case_no'))
                                <small class="text-block">{{ $errors->first('case_no') }}</small>
                                @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="" name="case_no" value="{{ old('case_no') }}">
                                    <div class="input-group-btn">
                                        <!-- Buttons -->
                                        <button class="btn btn-default" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if(isset($case_no))
                        Search for Case No.: <u>{{ $case_no }}</u>
                        <br /><br />
                        @endif
                        @if(count($cases) > 0)
                        @foreach($cases as $data)
                        <div class="list-group">
                            <a href="#" class="list-group-item">
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
                        {{ $cases->links() }}
                        @else
                        <h3>No Result</h3>
                        @endif
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-sm-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Case List</h5>
                    <div class="ibox-content">
                        @foreach($latest_cases as $data)
                        <a href="#" class="list-group-item">
                            Case No: {{ $data->case_unique_no }}
                            <span class="badge">{{ $data->user_name }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    
                   
                    

@endsection
