@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Victim List</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ URL::to('home') }}">Case List</a>
            </li>
            <li class="active">
                <strong>Victim List</strong>
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
                    <h3>Victims</h3>
                </div>
                <div class="ibox-content">
                    <form action="{{ route('victim.search') }}" method="GET">
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
                    @if(count($victims) > 0)
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Sex</th>
                                <th>Nationality</th>
                                <th>Birth Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($victims as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->first_name . ' ' . $data->mid_name . ' ' . $data->last_name }}</td>
                                <td>{{ ucfirst($data->sex) }}</td>
                                <td>{{ ucfirst($data->nationality) }}</td>
                                <td>{{ date('F d, Y', strtotime($data->birth_date)) }}</td>
                                <td>
                                    <a href="{{ route('victim.update.view', ['victim_id' => $data->victim_id]) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Update</a>
                                    <a href="{{ route('victim.update.view', ['victim_id' => $data->victim_id]) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Show</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                                
                             
                    </table>
                    
                    @else
                        <h3>No Result</h3>
                    @endif

                    {{ $victims->appends(['name' => isset($name) ? $name : ''])->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
