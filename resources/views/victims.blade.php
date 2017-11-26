@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Victims</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ URL::to('home') }}">Dashboard</a>
            </li>
            <li class="active">
                <strong>Victims</strong>
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
                    <h5>Case List</h5>
                    <div class="ibox-content">
                        <form action="{{ route('victim.search') }}" method="GET">
                            <div class="form-group @if($errors->has('name')) has-error @endif">
                                @if($errors->has('name')) 
                                        <small class="text-block">{{ $errors->first('name') }}</small>
                                @endif
                                <div class="input-group">
                                  <input type="text" class="form-control" aria-label="" name="name">
                                  <div class="input-group-btn">
                                    <!-- Buttons -->
                                    <button class="btn btn-default" type="submit">Search</button>
                                  </div>
                                </div>
                            </div>
                        </form> 
                        @if(isset($name))
                            Search for Suspect Name: <u>{{ $name }}</u>
                            <br /><br />
                        @endif
                        @if(count($victims) > 0)
                        <ul class="list-group">
                            @foreach($victims as $data)
                            
                              <li class="list-group-item">
                                <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#more_details{{ $data->victim_id }}">see more..</button><br /><br />
                                Name: {{ $data->name }} <span class="badge">{{ date('F d, Y', strtotime($data->created_at)) }}</span><br />
                                Nationality: {{ ucfirst($data->nationality) }}<br />
                                
                              </li> 
                            <!-- Modal -->
                            <div class="modal fade" id="more_details{{ $data->victim_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">{{ $data->name }}</h4>
                                  </div>
                                  <div class="modal-body">
                                    <label>Address: </label>&nbsp;&nbsp;<small>{{ $data->address }}</small><br />
                                    <label>Occupation: </label>&nbsp;&nbsp;<small>{{ $data->occupation }}</small><br />
                                    <label>Birth Date: </label>&nbsp;&nbsp;<small>{{ date('F d, Y', strtotime($data->birth_date)) }}</small><br />
                                    <label>Gender: </label>&nbsp;&nbsp;<small>{{ $data->gender }}</small><br />
                                    <label>Civil Status: </label>&nbsp;&nbsp;<small>{{ $data->civil_status }}</small><br />
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endforeach
                            </ul>
                            {{ $victims->links() }}
                        @else
                        <h3>No Result</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
