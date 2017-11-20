@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <h4>Case</h4>
                        </div>
                        <div class="col-xs-6 text-right">
                            {{-- <a class="btn btn-warning" href="{{ route('case.add.view') }}"><i class="fa fa-plus"></i> Add Case</a> --}}
                        </div>
                    </div>
                </div>

                <div class="panel-body">
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

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Latest Case Posted</h4></div>

                <div class="panel-body">
                    <div class="list-group">
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
