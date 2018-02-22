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
                    <form action="{{ route('reports.user-logs') }}" method="get">
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
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Activity</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($user_logs) && count($user_logs) > 0)
                                        @foreach($user_logs as $user_log)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $user_log->user->name }}</td>
                                                <td>{{ $user_log->activity }}</td>
                                                <td>{{ $user_log->created_at }}</td>
                                            </tr>
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