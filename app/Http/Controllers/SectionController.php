<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Facultie;
use App\Models\Classroom;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties= Facultie::with(['sections'])->get();
        $list_faculties= Facultie::all();
        // $sections=Section::all();
        return view('pages.section.index', compact('faculties', 'list_faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Section::create([
            'name' => ['en'=>$request->name_en , 'ar'=>$request->name],
            'status'=> 1,
            'facultie_id' => $request->facultie_id,
            'classroom_id' => $request->classroom_id,
        ]);
        toastr()->success('CREATE ClassRoom success');
        return redirect()->route('sections.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Section $section)
    {

        $section=Section::findOrFail($request->id);
        $section->update([
            'name' => ['en'=>$request->name_en , 'ar'=>$request->name],
            'status'=>1,
            'facultie_id' => $request->facultie_id,
            'classroom_id' => $request->classroom_id,
        ]);
        toastr()->success('UPDATE ClassRoom success');
        return redirect()->route('sections.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $section=Section::findOrFail($request->id);
        $section->delete();
        toastr()->success('DELETE ClassRoom success');
        return redirect()->route('sections.index');

    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("facultie_id", $id)->pluck("name", "id");

        return $list_classes;
    }
}
