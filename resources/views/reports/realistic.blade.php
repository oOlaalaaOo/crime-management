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
                <strong>Realistic Report</strong>
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
                    <form action="{{ route('reports.realistic') }}" method="get">
                        <div class="row">
                            <div class="col-xs-6">
                                {{-- <input type="text" name="datepicker" id="datepicker" class="form-control"> --}}

                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="datepicker" name="datepicker" placeholder="Please click here to show calendar" class="form-control" value="">
                                    <span class="input-group-btn"> <button type="submit" class="btn btn-primary">Generate Report
                                        </button> </span>
                                </div>
                            </div>
                    </form>

                            <div class="col-xs-12">
                                <br />
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="background-color: #eee">
                                            <th>Nature of Crime</th>                    
                                            <th>Total Crimes Cleared</th>
                                            <th>Total Crimes Solved</th>
                                            <th>Total Date Committed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <pre>
                                            {{ var_export($cases) }}
                                        </pre> --}}
                                        @if(isset($crimes))
                                        <?php 
                                            $total_crime_cleared = 0; 
                                            $total_crime_solved = 0;
                                            $total_committed = 0;
                                        ?>
                                            @foreach($crimes as $c)
                                                <tr style="background-color: #000; color: #fff">
                                                    <td>{{ $c->crime_type_name }}</td>  
                                                    <td>{{ $cTypeCleared[$c->crime_type_id] }}</td>
                                                    <td>{{ $cTypeSolved[$c->crime_type_id] }}</td>
                                                    <td>{{ $cType[$c->crime_type_id] }}</td>
                                                    <?php 
                                                        $total_committed += $cType[$c->crime_type_id]; 
                                                        $total_crime_cleared += $cTypeCleared[$c->crime_type_id];
                                                        $total_crime_solved +=  $cTypeSolved[$c->crime_type_id];
                                                    ?>
                                                </tr>
                                                @foreach($c->crime_categories as $cat)
                                                <tr style="background-color: green; color: #fff">
                                                    <td>{{ $cat->crime_category_name }}</td>
                                                    <td>{{ $cCatCleared[$cat->crime_category_id] }}</td>
                                                    <td>{{ $cCatSolved[$cat->crime_category_id] }}</td>
                                                    <td>{{ $cCat[$cat->crime_category_id] }}</td>
                                                </tr>
                                                <?php 
                                                    $total_committed += $cCat[$cat->crime_category_id]; 
                                                    $total_crime_cleared += $cCatCleared[$cat->crime_category_id];
                                                    $total_crime_solved +=  $cCatSolved[$cat->crime_category_id];
                                                ?>
                                                @foreach($cat->offenses as $off)
                                                <tr style="background-color: #eee;">
                                                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $off->offense_name }}</td>
                                                    <td>{{ $cOffCleared[$off->offense_id] }}</td>
                                                    <td>{{ $cOffSolved[$off->offense_id] }}</td>
                                                    <td>{{ $cOff[$off->offense_id] }}</td>
                                                </tr>
                                                <?php 
                                                    $total_committed += $cOff[$off->offense_id];
                                                    $total_crime_cleared += $cOffCleared[$off->offense_id];
                                                    $total_crime_solved +=  $cOffSolved[$off->offense_id];
                                                ?>
                                                @endforeach
                                                @endforeach
                                            @endforeach
                                            <tr>
                                                <td><strong>Total:</strong></td>
                                                <td>{{ $total_crime_cleared }}</td>
                                                <td>{{ $total_crime_solved }}</td>
                                                <td>{{ $total_committed }}</td>
                                            </tr>
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