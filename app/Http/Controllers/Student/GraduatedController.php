<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Facultie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GraduatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= Student::onlyTrashed()->get();
        return view('pages.student.Graduated.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties= Facultie::all();
        $students=Student::all();

        return view('pages.student.Graduated.create',
        ['faculties'=>$faculties,'students'=>$students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students= Student::where('facultie_id', $request->facultie_id)->where('classroom_id', $request->classroom_id)->where('section_id', $request->section_id)->get();
        if($students->count() < 1){
            return redirect()->back()->with('error','لا يوجد بيانات في جدول الطلاب ');
        }

        foreach($students as $student){
            $ids = explode(',',$student->id);
            Student::whereIn('id',$ids)->Delete();

        }

        toastr()->success('success');

        return redirect()->route('Graduateds.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success('success back');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error('DELETE');
        return redirect()->back();
    }
}
