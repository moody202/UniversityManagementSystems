@extends('layouts.master')
@section('css')

@section('title')
    {{ __('university.show_fac') }}
@stop
@endsection
@section('page-header')
@section('PageTitle')
{{ __('university.show_fac') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('university.show_fac') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ __('university.show_fac') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ __('university.add_fac')}}
                </button>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>note</th>
                                <th>prcc</th>
                            </tr>
                        </thead>
                        <tbody>


                                <tr>

                                    <td>number</td>
                                    <td>name</td>
                                    <td>note</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit"
                                            title="edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete"
                                            title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
