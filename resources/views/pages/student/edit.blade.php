@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Edit Student
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Edit students
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
                            <form action="{{route('student.update',$student->id)}}" method="POST" >
                                @method('patch')
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Email</label>
                                    <input type="email" name="email" value="{{ $student->email }}" class="form-control">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">Password</label>
                                    <input type="password" name="password" value="{{ $student->password }}" class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="id" value="{{$student->id}}">

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Name Arabic</label>
                                    <input type="text" name="name" value="{{ $student->name }}" class="form-control">
                                    @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">Name English</label>
                                    <input type="text" name="name_en" value="{{ $student->name_en }}" class="form-control">
                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> Birth Date :<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text"  id="datepicker-action" name="birth_day" value="{{ $student->birth_day }}" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">Faculties</label>
                                    <select class="custom-select my-1 mr-sm-2" name="facultie_id">
                                        <option selected value="{{ $student->facultie_id }}" >{{ $student->faculties->name }}</option>
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
                                    <label for="inputState">Classroom</label>
                                    <select class="custom-select my-1 mr-sm-2" name="classroom_id">
                                        <option selected value="{{ $student->classroom_id }}" >{{ $student->classrooms->name }}</option>
                                        @foreach($classrooms as $classroom)
                                            <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('classroom_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">Sections</label>
                                    <select class="custom-select my-1 mr-sm-2" name="section_id">
                                        <option selected value="{{ $student->section_id }}" >{{ $student->sections->name }}</option>
                                        @foreach($sections as $section)
                                            <option value="{{$section->id}}">{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">Notionlities</label>
                                    <select class="custom-select my-1 mr-sm-2" name="notionlitie_id">
                                        <option selected value="{{ $student->notionlitie_id }}" >{{ $student->notionlities->name }}</option>
                                        @foreach($notionlities as $notionlitie)
                                            <option value="{{$notionlitie->id}}">{{$notionlitie->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('notionlitie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">Gender</label>
                                    <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                        <option selected value="{{ $student->gender_id }}" >{{ $student->genders->name }}</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">religions</label>
                                    <select class="custom-select my-1 mr-sm-2" name="religion_id">
                                        <option selected  value="{{ $student->religion_id }}"> {{ $student->religions->name }}</option>
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
                                        <option selected value="{{ $student->parent_id }}" >{{ $student->my_parents->name_father}}</option>
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
                                            <option value="{{ $year}}" {{$year == $student->academic_year ? 'selected' : ' '}}>{{ $year }}</option>
                                        @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>



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
@endsection
