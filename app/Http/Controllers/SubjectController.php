<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\RoomModel;
use App\Models\Day;
use App\Models\SectionModel;
use App\Models\SectionInfoModel;
use Carbon\Carbon;
class SubjectController extends Controller
{

    public function index($id)  {
        $courseId = $id;
        $allDetails = $this->getAll($id);
        $room = $this->showRoom();
        $day = $this->showDay();
        $section = $this->showSection();
        return view('subject', compact(['courseId','allDetails','room','day','section']));
    }

    public function showSubject(string $id){
        $row = Subject::where('course_id', $id)->get();
        // return dd($id);
        $response = [];
        foreach ($row as $data){
            $response[] = array(
                'subject_code' => $data->subject_code,
                'subject' => $data->name,
                'lec_unit' => $data->lec_units,
                'lab_unit' => $data->lab_units,
                'semester' => $data->get_semester->name,
                'year' => $data->get_year->name,
                'button' => '<div class="btn-group"><button type="button" class="btn btn-info btn-sm" id="show-section" data-id="'.$data->id.'">Show</button><button type="button" class="btn btn-success btn-sm" id="add-section" data-id="'.$data->id.'">Add</button></div>',
            );
        }
        return response()->json($response);
    }
    public function getAll($id){
        $all = Subject::where('course_id', $id)->first();
        return $all;
    }

    public function showRoom(){
        $all = RoomModel::all();

        return $all;
    }
    public function showDay(){
        $all = Day::all();

        return $all;
    }
    public function showSection(){
        // $section = SectionModel::pluck('section_id');
        $all = SectionInfoModel::all();

        return $all;
    }
    public function addSection(Request $request){
        // $findDay = SectionModel::where('day_id', $request->day_id)->get();
        // if($findDay->isEmpty()){
            $find = SectionModel::where('room_id', $request->room_id)->where('day_id', $request->day_id)->where('time_in', '<', $request->time_out)
                  ->where('time_out', '>', $request->time_in)->first();
                //   dd($find);
        // }
        if($find == null){
            $add = SectionModel::create([
                'section_id' => $request->section_id,
                'subject_id' => $request->subject_id,
                'slot' => $request->slot,
                'room_id' => $request->room_id,
                'time_in' => $request->time_in,
                'time_out' => $request->time_out,
                'day_id' => $request->day_id,
            ]);
            return redirect()->back()->with('success', $request->name. ' section added');
        }else{
            return redirect()->back()->with('error', 'Schedule conflict with '. $find->get_section->name);
        }
    }
    public function returnCourse(Request $request){
        $id = $request->query('id');
        $return = SectionModel::all()->where('subject_id', $id);

        $response = [];
        foreach($return as $row){
            $response[] = array(
                'course' => $row->get_section->name,
                'slot' => $row->slot,
                'time_in' => date('g:i A', strtotime($row->time_in)),
                'time_out' => date('g:i A', strtotime($row->time_out)),
                'day' => $row->get_day->name,
            );
        }
        return response()->json($response);
    }
}
