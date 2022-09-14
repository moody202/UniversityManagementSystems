<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Facultie;
use App\Models\Religion;
use App\Models\Classroom;
use App\Models\Notionlitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $faculties= Facultie::all();
        $doctors=Doctor::all();

        if ($request->has('search')) {
            $doctors = Doctor::where('name', 'like', "%{$request->search}%")->orWhere('email', 'like', "%{$request->search}%")->get();
        }
        return view('pages.Dr.index',compact('doctors'),['doctors'=>Doctor::all(),
        'religions'=>Religion::all(),
        'genders'=>Gender::all(),
        'notionlities'=>Notionlitie::all(),
        'faculties'=>Facultie::all(),
        'classrooms'=>Classroom::all(),
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Dr.create',[  'religions'=>Religion::all(),
        'genders'=>Gender::all(),
        'notionlities'=>Notionlitie::all(),
        'faculties'=>Facultie::all(),
        'classrooms'=>Classroom::all(),
        'sections'=>Section::all(),
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =request()->validate([
            'name' =>['string','required','max:20',],
            'email'=>['string','required','email','max:255'],
            'password' =>['string','required','min:8'],
            'facultie_id'=>['required'],
            'classroom_id'=>['required'],
            'section_id'=>['required'],
            'notionlitie_id'=>['required'],
            'gender_id'=>['required'],
            'religion_id'=>['required'],
        ]);
        Doctor::create($data);
        toastr()->success('success');

        return redirect()->route('Dr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $doctor= Doctor::find($id);
        return view('pages.Dr.edit',['doctor'=>$doctor,
        'religions'=>Religion::all(),
        'genders'=>Gender::all(),
        'notionlities'=>Notionlitie::all(),
        'faculties'=>Facultie::all(),
        'classrooms'=>Classroom::all(),
        'sections'=>Section::all(),
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {

       $doctor->update([
        'name' => $request->name,
        'email'=>$request->email,
        'password' =>$request->password,
        'facultie_id'=>$request->facultie_id,
        'classroom_id'=>$request->classroom_id,
        'section_id'=>$request->section_id,
        'notionlitie_id'=>$request->notionlitie_id,
        'gender_id'=>$request->gender_id,
        'religion_id'=>$request->religion_id,
       ]);
       toastr()->success('success');

       return redirect()->route('Dr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Doctor $doctor)
    {
        Doctor::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}
