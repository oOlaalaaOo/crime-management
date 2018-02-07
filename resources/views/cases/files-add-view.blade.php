@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.html">Dashboard</a>
            </li>
            {{-- <li class="active">
                <strong>Breadcrumb</strong>
            </li> --}}
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-default" href="{{ route('case.details', ['case_id' => $case_id]) }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Case Files</h2>
                </div>
                <div class="ibox-content">
      
                    <form action="{{ route('case.files.add') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="case_id" value="{{ $case_id }}">
                        <div class="form-group">
                            <img src="{{ URL::asset('assets/img/default-case.jpg') }}" id="photoPreview" class="img-thumbnail" width="500" height="400"><br /><br />
                            <input type="file" name="photoFile" id="photoFile">
                            <br />
                        </div>

                        <div class="form-group">
                            <button class="btn btn-default btn-lg">Submit Case Files</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection