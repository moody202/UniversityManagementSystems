<?php

namespace App\Http\Controllers\Student;

use App\Models\Image;
use App\Models\Doctor;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\Facultie;
use App\Models\MyParent;
use App\Models\Religion;
use App\Models\Classroom;
use App\Models\Notionlitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students=Student::all();
        if ($request->has('search')) {
            $students = Student::where('name', 'like', "%{$request->search}%")->orWhere('email', 'like', "%{$request->search}%")->get();
        }

        return view('pages.student.index',[
        'students' => $students,
        'doctors'=>Doctor::all(),
        'religions'=>Religion::all(),
        'genders'=>Gender::all(),
        'notionlities'=>Notionlitie::all(),
        'faculties'=>Facultie::all(),
        'classrooms'=>Classroom::all(),
        'my_parents'=>MyParent::all(),
        'sections'=>Section::all(),
        'images'=>Image::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.student.create',[
        'doctors'=>Doctor::all(),
        'religions'=>Religion::all(),
        'genders'=>Gender::all(),
        'notionlities'=>Notionlitie::all(),
        'faculties'=>Facultie::all(),
        'classrooms'=>Classroom::all(),
        'my_parents'=>MyParent::all(),
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
        DB::beginTransaction();
        $this->validate($request,[
            'name' =>['required','max:20',],
            'email'=>['string','required','email','max:255'],
            'password' =>['string','required','min:8'],
            'birth_day'=>['required'],
            'facultie_id'=>['required'],
            'classroom_id'=>['required'],
            'section_id'=>['required'],
            'notionlitie_id'=>['required'],
            'gender_id'=>['required'],
            'religion_id'=>['required'],
            'parent_id'=>['required'],

        ]);

       $student= Student::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'birth_day'=>$request->birth_day,
            'facultie_id'=>$request->facultie_id,
            'classroom_id'=>$request->classroom_id,
            'section_id'=>$request->section_id,
            'notionlitie_id'=>$request->notionlitie_id,
            'gender_id'=>$request->gender_id,
            'religion_id'=>$request->religion_id,
            'parent_id'=>$request->parent_id,
            'academic_year'=>$request->academic_year,
        ]);


            if ($request->hasfile('photos')) {
                foreach ($request->file('photos') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$student->name, $file->getClientOriginalName(), 'upload_attachments');

                    // insert in image_table
                    Image::create([
                        'filename'=>$name,
                        'imageable_id'=>$student->id,
                        'imageable_type'=>Student::class,
                    ]);
                }
            }
        DB::commit(); // insert data

        toastr()->success('success');

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student=Student::findOrfail($id);
        return view('pages.student.show',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::find($id);
        return view('pages.student.edit',['student' => $student,
        'religions'=>Religion::all(),
        'genders'=>Gender::all(),
        'notionlities'=>Notionlitie::all(),
        'faculties'=>Facultie::all(),
        'classrooms'=>Classroom::all(),
        'my_parents'=>MyParent::all(),
        'sections'=>Section::all(),
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $student->update([
            'name' =>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'birth_day'=>$request->birth_day,
            'facultie_id'=>$request->facultie_id,
            'classroom_id'=>$request->classroom_id,
            'section_id'=>$request->section_id,
            'notionlitie_id'=>$request->notionlitie_id,
            'gender_id'=>$request->gender_id,
            'religion_id'=>$request->religion_id,
            'parent_id'=>$request->parent_id,
            'academic_year'=>$request->academic_year
       ]);

        toastr()->success('UPDATE success');

        return redirect()->route('student.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Student $student)
    {
        $student=Student::find($request->id)->delete();
        return redirect()->back();
    }
    public function Get_classrooms($id){

        $list_classes = Classroom::where("facultie_id", $id)->pluck("name", "id");
        return $list_classes;

    }

    public function Upload_attachment(Request $request , Student $student){
    if ($request->hasfile('photos')) {
        foreach ($request->file('photos') as $file) {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->name, $file->getClientOriginalName(), 'upload_attachments');

            // insert in image_table
            Image::create([
                'filename'=>$name,
                'imageable_id'=>$request->student_id,
                'imageable_type'=>Student::class,
            ]);
        }
    }
    toastr()->success('UPDATE success');

    return redirect()->route('student.show',$request->student_id);
}


    public function Download_attachment($studentname , $filename){


        return response()->download(public_path('attachments/students/'.$studentname.'/'.$filename));

    }




        public function Delete_attachment(Request $request)
        {
            // Delete img in server disk
            Storage::disk('upload_attachments')->delete('attachments/students/'.$request->name.'/'.$request->filename);

            // Delete in data
            image::where('id',$request->id)->where('filename',$request->filename)->delete();

            toastr()->error('DELETE FILE SUCCESSFUL');
            return redirect()->route('student.show',$request->student_id);
        }



}
