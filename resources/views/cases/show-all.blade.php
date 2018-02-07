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
            
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Case List <span class="pull-right"><a class="btn btn-warning" href="{{ route('case.add.view') }}"><i class="fa fa-plus"></i> Add Case</a></span></h2>
                </div>
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
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if(isset($case_no))
                    Search for Case No.: <u>{{ $case_no }}</u>
                    <br /><br />
                    @endif
                    @if(count($cases) > 0)
                    
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Case No</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cases as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->case_unique_no }}</td>
                                <td>@if($data->case_status == 'ongoing')<span class="label label-info">{{ ucfirst($data->case_status) }}</span> @else <span class="label label-danger">{{ ucfirst($data->case_status) }}</span> @endif</td>
                                <td>{{ date('F d, Y H:i:s', strtotime($data->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('case.details', ['case_id' => $data->case_id]) }}" class="btn btn-sm btn-default"><i class="fa fa-mail-forward"></i> View</a> 
                                    @if($data->case_status == 'ongoing')
                                    <a href="{{ route('case.update.view', ['case_id' => $data->case_id]) }}" class="btn btn-default btn-sm" title="Edit details"><i class="fa fa-pencil"></i> Edit</a> 
                                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#status_modal"><i class="fa fa-legal"></i> Cased Close?</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="status_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Action: Update Status</h4>
                                          </div>
                                          <div class="modal-body">
                                            Confirm Update Status by clicking Confirm button
                                          </div>
                                          <div class="modal-footer">
                                            <form action="{{ route('case.status.update') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="case_id" value="{{ $data->case_id }}">
                                                <button type="submit" class="btn btn-default">Confirm Update Status</button>
                                                
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">
                                {{ $cases->appends(['case_no' => isset($case_no) ? $case_no : ''])->links() }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
                
                @else
                <h3>No Result</h3>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection