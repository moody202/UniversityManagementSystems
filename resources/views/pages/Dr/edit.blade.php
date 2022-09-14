@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Edit Doctor
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Edit Doctor
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
                            <form action="{{route('Dr.update',$doctor->id)}}" method="POST" >
                                @method('PATCH')
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Email</label>
                                    <input type="email" name="email" value="{{ $doctor->email }}" class="form-control">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">Password</label>
                                    <input type="password" name="password" value="{{ $doctor->password }}" class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <input type="hidden" name="id" value="{{$doctor->id}}">
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Name Arabic</label>
                                    <input type="text" name="name" value="{{ $doctor->name }}" class="form-control">
                                    @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">Name English</label>
                                    <input type="text" name="name_en" value="{{ $doctor->name_en }}" class="form-control">
                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">Faculties</label>
                                    <select class="custom-select my-1 mr-sm-2" name="facultie_id">
                                        <option selected value="{{ $doctor->facultie_id }}" >{{ $doctor->faculties->name }}</option>
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
                                        <option selected value="{{ $doctor->classroom_id }}" >{{ $doctor->classrooms->name }}</option>
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
                                        <option selected value="{{ $doctor->section_id }}" >{{ $doctor->sections->name }}</option>
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
                                        <option selected value="{{ $doctor->notionlitie_id }}" >{{ $doctor->notionlities->name }}</option>
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
                                        <option selected value="{{ $doctor->gender_id }}" >{{ $doctor->genders->name }}</option>
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
                                        <option selected  value="{{ $doctor->religion_id }}"> {{ $doctor->religions->name }}</option>
                                        @foreach($religions as $religion)
                                            <option value="{{$religion->id}}">{{$religion->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('religion_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
