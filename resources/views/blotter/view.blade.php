@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Blotter</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="{{ route('home') }}">Case List</a>
            </li>
            <li class="active">
                <a href="{{ route('blotter.all') }}">Blotter List</a>
            </li>
            <li class="active">
                <strong>Blotter View</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('blotter.all') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-7">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3>Blotter</h3>
                        </div>
                        <div class="col-xs-6">

                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <small>Title</small>
                    <h3>{{ $blotter->blotter_title }}</h3>
                    <small>Content</small>
                    <p>{{ $blotter->blotter_content }}</p>

                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Complainant</h3>
                </div>
                <div class="ibox-content">
                    
                    <h3>{{ $blotter->complainant_name }}</h3>
                    <p>Address: <br />{{ $blotter->complainant_address }}</p>
                    <p>Contact No.: <br />{{ $blotter->complainant_contact_no }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection