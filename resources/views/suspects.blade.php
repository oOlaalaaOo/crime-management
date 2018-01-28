@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Suspects</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ URL::to('home') }}">Dashboard</a>
            </li>
            <li class="active">
                <strong>Suspects</strong>
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
                    <h2>Suspect List</h2>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('suspect.search') }}" method="GET">
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            @if($errors->has('name'))
                            <small class="text-block">{{ $errors->first('name') }}</small>
                            @endif
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="" name="name" placeholder="You may enter the person first name or middle name or last name">
                                <div class="input-group-btn">
                                    <!-- Buttons -->
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if(isset($name))
                    Search result for: <u>{{ $name }}</u>
                    <br /><br />
                    @endif
                    @if(count($suspects) > 0)
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Nationality</th>
                                <th>Birth Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suspects as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->first_name . ' ' . $data->mid_name . ' ' . $data->last_name }}</td>
                                <td>{{ ucfirst($data->gender) }}</td>
                                <td>{{ ucfirst($data->nationality) }}</td>
                                <td>{{ date('F d, Y', strtotime($data->birth_date)) }}</td>
                                <td><a href="{{ route('suspect.update.view', ['suspect_id' => $data->suspect_id]) }}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i> Update</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <ul class="pagination pull-right"></ul>
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
