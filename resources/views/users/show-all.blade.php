@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>User Profile</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Profile</strong>
            </li>
            {{-- <li class="active">
                <strong>Breadcrumb</strong>
            </li> --}}
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-warning" href="{{ route('users.add.view') }}"><i class="fa fa-plus"></i> Add User</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Users</h2>
                </div>
                <div class="ibox-content">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <th data-toggle="true">Username</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th data-hide="all">Total Case</th>
                                <th data-hide="all">Completed </th>
                                <th data-hide="all">Pending</th>
                                <th data-hide="all">Rank</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td><label class="label label-info">{{ ucfirst($user->status) }}</label></td>
                                <td><strong>{{ $total_user_cases }}</strong></td>
                                <td><strong>{{ $completed_user_cases }}</strong></td>
                                <td>{{ $ongoing_user_cases }}</td>
                                <td>N/A</td>
                                <td><a href="{{ route('users.show', ['user_id' => $user->user_id]) }}" class="btn btn-xs btn-default"><i class="fa fa-mail-forward"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection