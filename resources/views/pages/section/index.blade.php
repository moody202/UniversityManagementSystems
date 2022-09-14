@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ __('section.section') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ __('section.section') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">
<a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
{{ trans('section.add') }}</a>
</div>

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<div class="card card-statistics h-100">
<div class="card-body">
<div class="accordion gray plus-icon round">

@foreach ($faculties as $facultie)

<div class="acd-group">
<a href="#" class="acd-heading">{{ $facultie->name }}</a>
<div class="acd-des">

<div class="row">
<div class="col-xl-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">
<div class="d-block d-md-flex justify-content-between">
<div class="d-block">
</div>
</div>
<div class="table-responsive mt-15">
<table class="table center-aligned-table mb-0">
<thead>
<tr class="text-dark">
<th>#</th>
<th>{{ __('section.name_section') }}
</th>
<th>{{ __('classroom.class') }}</th>
<th>{{ __('section.status') }}</th>
<th>{{ __('section.processes') }}</th>
</tr>
</thead>
<tbody>
<?php $i = 0; ?>
@foreach ($facultie->sections as $list_Sections)
<tr>
<?php $i++; ?>
<td>{{ $i }}</td>
<td>{{ $list_Sections->name }}</td>
<td>{{ $list_Sections->classrooms->name }}
</td>
<td>
@if ($list_Sections->status === 1)
<label
class="badge badge-success">active</label>
@else
<label
class="badge badge-danger">disactive</label>
@endif

</td>
<td>

<a href="#"
class="btn btn-outline-info btn-sm"
data-toggle="modal"
data-target="#edit{{ $list_Sections->id }}">Edit</a>
<a href="#"
class="btn btn-outline-danger btn-sm"
data-toggle="modal"
data-target="#delete{{ $list_Sections->id }}">Delete</a>
</td>
</tr>


<!--تعديل قسم جديد -->
<div class="modal fade"
id="edit{{ $list_Sections->id }}"
tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"
style="font-family: 'Cairo', sans-serif;"
id="exampleModalLabel">edit
</h5>
<button type="button" class="close"
data-dismiss="modal"
aria-label="Close">
<span
aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<form action="{{ route('sections.update',$list_Sections->id) }}" method="POST">
{{ method_field('patch') }}
    @csrf
<div class="row">
<div class="col">
<input type="text"
name="name"
class="form-control"
value="{{ $list_Sections->getTranslation('name', 'ar') }}">
</div>

<div class="col">
<input type="text"
name="name_en"
class="form-control"
value="{{ $list_Sections->getTranslation('name', 'en') }}">
<input id="id"
type="hidden"
name="id"
class="form-control"
value="{{ $list_Sections->id }}">
</div>

</div>
<br>


<div class="col">
<label for="inputName"
class="control-label">Facultie</label>
<select name="facultie_id"
class="custom-select"
onclick="console.log($(this).val())">
<!--placeholder-->
<option
value="{{ $facultie->id }}">
{{ $facultie->name }}
</option>
@foreach ($list_faculties as $list_facultie)
<option
value="{{ $list_facultie->id }}">
{{ $list_facultie->name }}
</option>
@endforeach
</select>
</div>
<br>

<div class="col">
<label for="inputName" class="control-label">Classroom</label>
<select name="classroom_id" class="custom-select">
<option value="{{ $list_Sections->classrooms->id }}">
{{ $list_Sections->classrooms->name }}
</option>
</select>
</div>
<br>

<div class="col">
<div class="form-check">

@if ($list_Sections->status === 1)
<input type="checkbox" checked class="form-check-input" name="status" id="exampleCheck1">
@else
<input type="checkbox" class="form-check-input" name="status" id="exampleCheck1">
@endif
<label
class="form-check-label"
for="exampleCheck1">Status</label><br>

{{-- <div class="col">
<label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
<select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
@foreach($list_Sections->teachers as $teacher)
<option selected value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
@endforeach

@foreach($teachers as $teacher)
<option value="{{$teacher->id}}">{{$teacher->Name}}</option>
@endforeach
</select>
</div> --}}
</div>
</div>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger">Submit</button>
</div>
</form>
</div>
</div>
</div>


<!-- delete_modal_Grade -->
<div class="modal fade" id="delete{{ $list_Sections->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
Delete
</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{ route('sections.destroy',$list_Sections->id) }}" method="post">
@method('Delete')
@csrf
delete
<input id="id" type="hidden" name="id" class="form-control" value="{{ $list_Sections->id }}">
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>




@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>
</div>

<!--اضافة قسم جديد -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
id="exampleModalLabel">
{{ __('section.add') }}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<form action="{{ route('sections.store') }}" method="POST">
    @csrf
<div class="row">
<div class="col">
<input type="text" name="name" class="form-control" placeholder="اسم القسم بالعربي"
>
</div>

<div class="col">
<input type="text" name="name_en" class="form-control"
>
</div>

</div>
<br>


<div class="col">
<label for="inputName"
class="control-label">Facultie</label>
<select name="facultie_id" class="custom-select"
onchange="console.log($(this).val())">
<!--placeholder-->
<option value="" selected
disabled>Select Facultie
</option>
@foreach ($list_faculties as $facultie)
<option value="{{ $facultie->id }}"> {{ $facultie->name }}
</option>
@endforeach
</select>
</div>
<br>

<div class="col">
<label for="inputName"
class="control-label">Classroom</label>
<select name="classroom_id" class="custom-select">

</select>
</div><br>

{{-- <div class="col">
<label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
<select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
@foreach($teachers as $teacher)
<option value="{{$teacher->id}}">{{$teacher->Name}}</option>
@endforeach
</select>
</div> --}}


</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary"
data-dismiss="modal">close</button>
<button type="submit"
class="btn btn-danger">Submit</button>
</div>
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


<script>
$(document).ready(function () {
$('select[name="facultie_id"]').on('change', function () {
var facultie_id = $(this).val();
if (facultie_id) {
$.ajax({
url: "{{ URL::to('classes') }}/" + facultie_id,
type: "GET",
dataType: "json",
success: function (data) {
$('select[name="classroom_id"]').empty();
$.each(data, function (key, value) {
$('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
});
},
});
} else {
console.log('AJAX load did not work');
}
});
});

</script>

@endsection
