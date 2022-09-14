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
   تخرج الطلاب <i class="fas fa-user-graduate"></i>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('Graduateds.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">تخرج طالب جديد</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>gender</th>
                                            <th>facultie</th>
                                            <th>classroom</th>
                                            <th>Section</th>
                                            <th>notionlities</th>
                                            <th>سنة التخرج</th>
                                            <th>Processes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->genders->name}}</td>
                                            <td>{{$student->faculties->name}}</td>
                                            <td>{{$student->classrooms->name}}</td>
                                            <td>{{$student->sections->name}}</td>
                                            <td>{{$student->notionlities->name}}</td>
                                            <td>{{$student->academic_year}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Return_Student{{ $student->id }}" title="Delete">ارجاع الطالب</button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="Delete">حذف الطالب</button>

                                                </td>
                                            </tr>
                                        @include('pages.student.Graduated.return')
                                        @include('pages.student.Graduated.Delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
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
