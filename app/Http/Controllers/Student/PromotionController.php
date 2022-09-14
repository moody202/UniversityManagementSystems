<?php

namespace App\Http\Controllers\Student;

use App\Models\Section;
use App\Models\Student;
use App\Models\Facultie;
use App\Models\Classroom;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.student.promotion.index', ['promotions' => Promotion::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.student.promotion.create', [
        'faculties'=>Facultie::all(),'promotions' => Promotion::all(),'students'=>Student::all(),
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
try {
    $students = Student::where('facultie_id', $request->facultie_id)->where('classroom_id', $request->classroom_id)->where('section_id', $request->section_id)->where('academic_year', $request->academic_year)->get();
    if ($students->count() < 1) {
        return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
    }

    foreach ($students as $student) {

        $ids = explode(',', $student->id);
        Student::whereIn('id', $ids)
            ->update([
                'facultie_id'=>$request->facultie_id_new,
                'classroom_id'=>$request->classroom_id_new,
                'section_id'=>$request->section_id_new,
                'academic_year'=>$request->academic_year_new,
            ]);


        Promotion::updateOrCreate([
            'student_id'=>$request->student_id,
            'from_facultie_id'=>$request->facultie_id,
            'from_classroom_id'=>$request->classroom_id,
            'from_section_id'=>$request->section_id,
            'to_facultie_id'=>$request->facultie_id_new,
            'to_classroom_id'=>$request->classroom_id_new,
            'to_section_id'=>$request->section_id_new,
            'academic_year'=>$request->academic_year,
            'academic_year_new'=>$request->academic_year_new,
        ]);
    }
    DB::commit();
    toastr()->success('success');

    return redirect()->route('promotion.index');
}catch(\Exception $e){
    DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion,Request $request)
    {
        DB::beginTransaction();

        try {

            // التراجع عن الكل
            if($request->page_id ==1){

            $promotion = Promotion::all();
            foreach ($promotion as $promotion){

                //التحديث في جدول الطلاب
                $ids = explode(',',$promotion->student_id);
                Student::whereIn('id', $ids)
                ->update([
                'facultie_id'=>$promotion->from_facultie_id,
                'classroom_id'=>$promotion->from_classroom_id,
                'section_id'=> $promotion->from_section_id,
                'academic_year'=>$promotion->academic_year,
            ]);

                //حذف جدول الترقيات
                Promotion::truncate();

            }
                DB::commit();
                toastr()->error('DELETE');
                return redirect()->back();

            }

            else{

                $promotion = Promotion::findorfail($request->id);
                Student::where('id', $promotion->student_id)
                    ->update([
                        'facultie_id'=>$promotion->from_facultie_id,
                        'classroom_id'=>$promotion->from_classroom_id,
                        'section_id'=> $promotion->from_section_id,
                        'academic_year'=>$promotion->academic_year,
                    ]);


                Promotion::destroy($request->id);
                DB::commit();
                toastr()->error('DELETE');
                return redirect()->back();

            }

        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
