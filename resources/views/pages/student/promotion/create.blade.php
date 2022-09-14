@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    promotions Student
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
        ترقية الطلاب
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_promotions')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        <h6 style="color: red;font-family: Cairo">المرحلة الدراسية القديمة</h6><br>

                    <form method="POST" action="{{ route('promotion.store') }}">
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
                                    <option selected disabled>أختر اسم الكلية ...</option>
                                    @foreach($faculties as $facultie)
                                        <option value="{{$facultie->id}}">{{$facultie->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">المرحلة الدراسية : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">اختر القسم  : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>
                                    <option selected disabled>أختر القسم الكلية   ...</option>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">academic_year : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>اختر سنة الدراسية...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>



                        </div>
                        <br><h6 style="color: red;font-family: Cairo">المرحلة الدراسية الجديدة</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">اسم الكلية </label>
                                <select class="custom-select mr-sm-2" name="facultie_id_new" required>
                                    <option selected disabled>أختر اسم الكلية ...</option>
                                    @foreach($faculties as $facultie)
                                        <option value="{{$facultie->id}}">{{$facultie->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="classroom_id">المرحلة الدراسية : <span
                                    class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="classroom_id_new" required>
                                <option selected disabled>أختر اسم المرحلة  ...</option>

                            </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">اختر القسم  : </label>
                                <select class="custom-select mr-sm-2" name="section_id_new" required>
                                    <option selected disabled>أختر القسم الكلية   ...</option>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">اختر سنة الدراسية : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year_new">
                                        <option selected disabled>اختر سنة الدراسية   ...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
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
