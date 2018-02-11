@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Cases</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Cases</strong>
            </li>
            {{-- <li class="active">
                <strong>Breadcrumb</strong>
            </li> --}}
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
           {{--  @if(Auth::check() && Auth::user()->user_type_id == 2)
            <a class="btn btn-warning" href="{{ route('case.add.view') }}"><i class="fa fa-plus"></i> Add Case</a>
            @endif --}}
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">

        <div class="col-sm-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Case Lists</h3>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('case.admin-search') }}" method="GET">
                        <div class="form-group @if($errors->has('case_no')) has-error @endif">
                            @if($errors->has('case_no'))
                            <small class="text-block">{{ $errors->first('case_no') }}</small>
                            @endif
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="" name="case_no" placeholder="PLease enter case no. here">
                                <div class="input-group-btn">
                                    
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if(isset($case_no))
                    Search result for: <u>{{ $case_no }}</u>
                    <br /><br />
                    @endif
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Case No</th>
                                <th>Status</th>
                                <th>Handler</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cases as $case)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><strong>{{ $case->case_unique_no }}</strong></td>
                                <td>{{ ucfirst($case->status) }}</td>
                                <td>{{ $case->name }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $cases->appends(['case_no' => isset($case_no) ? $case_no : ''])->links() }}
                </div>
            </div>
        </div>
    
        <div class="col-xs-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Latest Case</h3>
                </div>
                <div class="ibox-content">
                    @if(count($latest_cases) > 0)
                    @foreach($latest_cases as $data)
                    <a href="#" class="list-group-item">
                        Case No: {{ $data->case_unique_no }}
                    </a>
                    @endforeach
                    
                    @else
                    <h3>No Case at all..</h3>
                    @endif
                </div>
            </div>
        </div>

        {{-- <div class="col-sm-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Bar Chart Example </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a></li>
                            <li><a href="#">Config option 2</a></li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="morris-bar-chart"></div>
                </div>
            </div>
        </div> --}}

    </div>
</div>

@endsection
@section('more_scripts')
    <script type="text/javascript">
        $(function() {

            $.ajax({
                url: '',
                method: 'get',
                data: '',
                success: function(resp) {

                }
            })

            Morris.Bar({
                element: 'morris-bar-chart',
                data: [
                    { y: '2006', a: 60 },
                    { y: '2007', a: 75 },
                    { y: '2008', a: 50 },
                    { y: '2009', a: 75 },
                    { y: '2010', a: 50 },
                    { y: '2011', a: 75 },
                    { y: '2012', a: 100 } 
                ],
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Series A'],
                hideHover: 'auto',
                resize: true,
                barColors: ['#1ab394'],
            });
        });
    </script>
@endsection