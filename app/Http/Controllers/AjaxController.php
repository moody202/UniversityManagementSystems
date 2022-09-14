<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Section;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // Get Classrooms
    public function getClassrooms($id)
    {
        return Classroom::where("facultie_id", $id)->pluck("name", "id");

    }

    //Get Sections
    public function Get_Sections($id){

        return Section::where("classroom_id", $id)->pluck("name", "id");

    }
}
