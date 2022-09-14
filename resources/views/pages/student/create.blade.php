@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Add Student
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Add Student
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('student.store')}}" method="post" autocomplete="off" enctype="multipart/form-data" >
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Email :<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">Password :<span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Name Arabic :<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control">
                                    @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">Name English</label>
                                    <input type="text" name="name_en" class="form-control">
                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> Birth Date :<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text"  id="datepicker-action" name="birth_day" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">Faculties :<span class="text-danger">*</span></label>
                                    <select class="custom-select my-1 mr-sm-2" name="facultie_id">
                                        <option selected >اختر الكلية</option>
                                        @foreach ($faculties as $facultie )
                                        <option value="{{ $facultie->id }}">
                                            {{ $facultie->name }}</option>
                                    @endforeach
                                    </select>
                                    @error('facultie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="classroom_id">Classroom :<span class="text-danger">*</span></label>
                                    <select class="custom-select my-1 mr-sm-2" name="classroom_id">
                                        <option selected >اختر الفرقة الدراسية</option>
                                        {{-- @foreach($classrooms as $classroom)
                                            <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('classroom_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">Sections :<span class="text-danger">*</span></label>
                                    <select class="custom-select my-1 mr-sm-2" name="section_id">
                                        <option selected >اختر  قسم الكلية</option>
                                        {{-- @foreach($sections as $section)
                                            <option value="{{$section->id}}">{{$section->name}}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">Notionlities <span class="text-danger">*</span></label>
                                    <select class="custom-select my-1 mr-sm-2" name="notionlitie_id">
                                        <option selected >اختر  الجنسية</option>
                                        @foreach($notionlities as $notionlitie)
                                            <option value="{{$notionlitie->id}}">{{$notionlitie->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('notionlitie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">Gender :<span class="text-danger">*</span></label>
                                    <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                        <option selected >اخترالنوع</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">religions :<span class="text-danger">*</span></label>
                                    <select class="custom-select my-1 mr-sm-2" name="religion_id">
                                        <option selected >اختر الديانة</option>
                                        @foreach($religions as $religion)
                                            <option value="{{$religion->id}}">{{$religion->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('religion_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">My Parent : <span class="text-danger">*</span></label>
                                    <select class="custom-select my-1 mr-sm-2" name="parent_id">
                                        <option selected >اختر والي الامر</option>
                                        @foreach($my_parents as $my_parent)
                                            <option value="{{$my_parent->id}}">{{$my_parent->name_father}}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="academic_year">academic_year : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="academic_year">
                                            <option selected disabled>academic_year...</option>
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
                            <br>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="student">Upload Image : <span class="text-danger">*</span></label>
                                    <input type="file" accept="image/*" name="photos[]" multiple>
                                </div>
                            </div>


                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Next</button>
                    </form>
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

    <script>
        $(document).ready(function () {
            $('select[name="facultie_id"]').on('change', function () {
                var facultie_id = $(this).val();
                if (facultie_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_classrooms') }}/" + facultie_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id"]').append('<option selected disabled >اختر الفرقة الدراسية</option>');
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('select[name="Classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
