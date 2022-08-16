<?php

namespace App\Http\Controllers;

use App\Models\Facultie;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClassroom;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms =Classroom::all();
        $faculties=Facultie::all();
        return view('pages.classroom.index', compact('classrooms', 'faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $List_Classes = $request->List_Classes;

        try {
            $this->validate($request,[
                'name' =>'required',
                'name_en' =>'required'
            ]);
            Classroom::create([
                'name' => ['en'=>$request->name_en , 'ar'=>$request->name],
                'facultie_id'=>$request->facultie_id,
            ]);




            // $validated = $request->validated();
            // foreach ($List_Classes as $List_Class) {

            //     $My_Classes = new Classroom();

            //     $My_Classes->name = ['en' => $List_Class['name_en'], 'ar' => $List_Class['name']];

            //     $My_Classes->facultie_id = $List_Class['facultie_id'];

            //     $My_Classes->save();

            // }
            toastr()->success('add ClassRoom success');

            return redirect()->route('classroom.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        try {

            $classroom=Classroom::findOrFail($request->id);
            $classroom->update([
                $classroom->name = ['en'=>$request->name_en , 'ar'=>$request->name],
                $classroom->facultie_id=$request->facultie_id,
            ]);
            toastr()->success('UPDATE ClassRoom success');

            return redirect()->route('classroom.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Classroom $classroom)
    {
        $classroom=Classroom::findOrFail($request->id)->delete();
        toastr()->success('DELETE ClassRoom success');

        return redirect()->route('classroom.index');
    }
}
