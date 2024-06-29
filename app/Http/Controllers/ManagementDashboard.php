<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Year;

class ManagementDashboard extends Controller
{
    public function index(){
        $semester = $this->showSemester();
        $year = $this->showYear();
        return view('management_dashboard', compact(['semester','year']));
    }
    public function addCourse(Request $request){
        $add = Course::create([
            'name'  => $request->name,
            'course_desc' => $request->course_desc
        ]);
        return redirect()->back()->with('success', $request->name . ' added successfully');
    }
    public function showCourse(){
        $rows = Course::all();

        $response = [];
        foreach ($rows as $data){
            $response[] = [
                'id' => $data->id,
                'name' => $data->name,
                'course_desc' => $data->course_desc,
                'button' => '<div class="d-flex justify-content-center"><button type="button" class="btn btn-sm btn-info" id="show-sub" data-id="'.$data->id.'">Show</button>|<button type="button" class="btn btn-sm btn-success" onclick="addSubject('. $data->id .')">Add</button></div>',
            ];
        }
        return response()->json($response);
    }
    public function showSemester(){
        $all = Semester::get();

        return $all;
    }

    public function showYear(){
        $all = Year::get();

        return $all;
    }
    public function addSubject(Request $request){
        $addSubject = Subject::create([
            'course_id' => $request->course_id,
            'name' => $request->name,
            'subject_code' => $request->subject_code,
            'subject_description' => $request->subject_description,
            'lec_units' => $request->lec_units,
            'lab_units' => $request->lab_units,
            'availability' => $request->availability
        ]);

        return redirect()->back()->with('success',$request->name.' added successfully');
    }
}
