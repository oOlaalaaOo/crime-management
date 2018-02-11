@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Reports</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ URL::to('home') }}">Case List</a>
            </li>
            <li class="active">
                <strong>Reports Daily</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <form action="{{ route('reports.yearly') }}" method="get">
                        <div class="row">
                            <div class="col-xs-3">
                                {{-- <input type="text" name="datepicker" id="datepicker" class="form-control"> --}}

                                <div class="form-group">
                                    <select name="datepicker" class="form-control">
                                        
                                        <option>-Select a Year-</option>
                                        <?php for($i = date('Y'); $i >= 1970; $i--){ ?>
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                {{-- <input type="text" name="datepicker" id="datepicker" class="form-control"> --}}

                                <div class="form-group">
                                    <select name="datepicker2" class="form-control">
                                        
                                        <option>-Select a Year-</option>
                                        <?php for($i = date('Y'); $i >= 1970; $i--){ ?>
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary">Generate Report</button>
                    </form>

                            <div class="col-xs-12">
                                <br />
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="background-color: #eee">
                                            <th>Date</th>
                                            <th>Officer</th>
                                            <th colspan="4"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <pre>
                                            {{ var_export($cases) }}
                                        </pre> --}}
                                        @if(isset($cDates) && count($cDates) > 0)
                                        

                                            @foreach($cDates as $cd)
                                                <tr style="background-color: #cbf2bd">
                                                    <td colspan="6"><strong>{{ $cd->cDate }}</strong></td>
                                                </tr>
                                                
                                                @foreach($cases[$cd->cDate] as $ckey => $cvalue)
                                                <tr>
                                                    <td style="background-color: #c3e6fa">Case No.: </td>
                                                    <td style="background-color: #c3e6fa">{{ $cvalue->case_unique_no }}</td>
                                                    <td colspan="4" rowspan="2" class="text-center"><br /><h3>CRIME DETAILS</h3></td>
                                                </tr>
                                                <tr style="background-color: #c3e6fa">
                                                    <td>Officer</td>
                                                    <td>{{ $cvalue->name }}</td>
                                                    
                                                </tr>
                                                    @foreach($case_details[$cvalue->case_id] as $cdkey => $cdvalue)
                                                    <tr>
                                                        <td colspan="2" class="text-center">-</td>
                                                        <td>{{ $cdvalue->crime_type_name }}</td>
                                                        <td>{{ $cdvalue->crime_category_name }}</td>
                                                        <td>{{ $cdvalue->crime_classification_name }}</td>
                                                        <td>{{ $cdvalue->offense_name }}</td>
                                                    </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection