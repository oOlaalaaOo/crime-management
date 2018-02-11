@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Users</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}"><strong>Cases</strong></a>
            </li>
            <li class="active">
                <strong>Users</strong>
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
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Officers</h2>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a class="btn btn-warning" href="{{ route('users.add.view') }}"><i class="fa fa-plus"></i> Add Officer</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Rank</th>
                                <th>Station</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($officers as $officer)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $officer->name }}</td>
                                <td>{{ $officer->code }}</td>
                                <td>{{ $officer->station }}</td>
                                <td><label class="label label-info">{{ ucfirst($officer->status) }}</label></td>
                                <td><a href="{{ route('users.show', ['user_id' => $officer->user_id]) }}" class="btn btn-xs btn-default"><i class="fa fa-mail-forward"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                {{ $officers->links() }}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>City Directors</h2>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a class="btn btn-warning" href="{{ route('users.add-city-director.view') }}"><i class="fa fa-plus"></i> Add City Director</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($directors as $director)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $director->name }}</td>
                                <td><label class="label label-info">{{ ucfirst($director->status) }}</label></td>
                                <td><a href="{{ route('users.show', ['user_id' => $director->user_id]) }}" class="btn btn-xs btn-default"><i class="fa fa-mail-forward"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                {{ $directors->links() }}
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