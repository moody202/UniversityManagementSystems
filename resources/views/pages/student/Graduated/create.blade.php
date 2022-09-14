@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    تخرج الطلاب
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تخرج الطلاب
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_Graduated'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_Graduated')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                        <form action="{{route('Graduateds.store')}}" method="post">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">اسم الطالب </label>
                                <select class="custom-select mr-sm-2" name="student_id" required>
                                    <option selected disabled>أختر اسم الطالب ...</option>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputState">اسم الكلية </label>
                                <select class="custom-select mr-sm-2" name="facultie_id" required>
                                    <option selected disabled>اختر اسم الكلية ......</option>
                                    @foreach($faculties as $facultie)
                                        <option value="{{$facultie->id}}">{{$facultie->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="classroom_id">classrooms: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">sections : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">تاكيد</button>
                    </form>

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
