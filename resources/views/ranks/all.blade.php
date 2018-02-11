@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Ranks</h2>
        <ol class="breadcrumb">
            <li class="active">
                <strong>Ranks</strong>
            </li>
            {{-- <li class="active">
                <strong>Breadcrumb</strong>
            </li> --}}
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-warning" href="{{ route('rank.add.view') }}"><i class="fa fa-plus"></i> Add</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Ranks</h2>
                </div>
                <div class="ibox-content">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Rank Name</th>
                                <th>Rank Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ranks as $rank)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $rank->code }}</td>
                                <td>{{ $rank->description }}</td>
                                <td>
                                    <a href="{{ route('rank.show', ['rank_id' => $rank->rank_id]) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a> <a href="#" class="btn btn-xs btn-default"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection