@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Show Student
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Show Student
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">Show Student</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">Attachments</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{ $student->name }}</td>
                                            <th scope="row">Email</th>
                                            <td>{{$student->email}}</td>
                                            <th scope="row">Gender</th>
                                            <td>{{$student->genders->name}}</td>
                                            <th scope="row">Nationality</th>
                                            <td>{{$student->notionlities->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">faculties</th>
                                            <td>{{$student->faculties->name}}</td>
                                            <th scope="row">Classroom</th>
                                            <td>{{ $student->classrooms->name }}</td>
                                            <th scope="row">Sections</th>
                                            <td>{{$student->sections->name}}</td>
                                            <th scope="row">religions</th>
                                            <td>{{$student->religions->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Date_of_Birth</th>
                                            <td>{{ $student->birth_day}}</td>
                                            <th scope="row">parent</th>
                                            <td>{{ $student->my_parents->name_father}}</td>
                                            <th scope="row">Images</th>
                                            @foreach ($student->images as $image)
                                            <td>{{ $image->filename }}</td>
                                            <img src="{{asset('attachments/students/kmail/'.$image->filename) }}" alt="" width="100" height="100" >
                                            @endforeach
                                            <th scope="row">السنة الدراسية</th>
                                            <td>{{ $student->academic_year}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{route('Upload_attachment')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">Attachments
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple required>
                                                        <input type="hidden" name="name" value="{{$student->name}}">
                                                        <input type="hidden" name="student_id" value="{{$student->id}}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                       Submit
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">filename</th>
                                                <th scope="col">created_at</th>
                                                <th scope="col">Processes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($student->images as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$attachment->filename}}</td>
                                                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{url('Download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}"
                                                           role="button" title="Download" ><i class="fa fa-download"></i>&nbsp; Download</a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $attachment->id }}"
                                                                title="Delete">Delete
                                                        </button>

                                                    </td>
                                                </tr>
                                                @include('pages.student.Delete_img')
                                            @endforeach
                                            </tbody>
                                        </table>
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
