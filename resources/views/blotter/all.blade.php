@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Blotter</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}"><strong>Cases</strong></a>
            </li>
            <li class="active">
                <strong>Blotter List</strong>
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
                            <h3>Blotter List</h3>
                        </div>
                        <div class="col-xs-6">
                            @if(Auth::user()->user_type_id == 2)
                            <a class="btn btn-warning pull-right" href="{{ route('blotter.add.view') }}"><i class="fa fa-plus"></i> Add New</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Complainant</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blotters as $blotter)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $blotter->blotter_title }}</td>
                                <td>{{ $blotter->blotter_content }}</td>
                                <td>{{ $blotter->complainant_name }}</td>
                                <td>
                                    <a href="{{ route('blotter.show', ['blotter_id' => $blotter->blotter_id]) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a> <a href="{{ route('blotter.view', ['blotter_id' => $blotter->blotter_id]) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> View</a> <a href="#" class="btn btn-xs btn-default"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blotters->links() }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection