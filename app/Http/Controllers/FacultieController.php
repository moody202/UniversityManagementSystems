<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Facultie;
use Illuminate\Http\Request;

class FacultieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties= Facultie::all();
        return view('pages.facultie.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.facultie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Facultie::created([
                'name' => $request->name,
                'note'=>$request->note,
            ]);
            toastr()->success('add Name success');

            return redirect()->route('facultie.index');

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facultie  $facultie
     * @return \Illuminate\Http\Response
     */
    public function show(Facultie $facultie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facultie  $facultie
     * @return \Illuminate\Http\Response
     */
    public function edit(Facultie $facultie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facultie  $facultie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facultie $facultie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facultie  $facultie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facultie $facultie)
    {
        //
    }
}
