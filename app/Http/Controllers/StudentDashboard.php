<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinanceEventModel;
use App\Models\Subject;
use App\Models\Enrolled;
use App\Models\User;
use App\Models\Accountability;
use Carbon\Carbon;

class StudentDashboard extends Controller
{
    public function index(){
        $ongoingEvents = $this->showOngoingEvents();
        return view('student_dashboard',compact('ongoingEvents'));
    }
    public function showOngoingEvents(){
        $dateToday = Carbon::now();
        $all = FinanceEventModel::where('event_date','>=', $dateToday)->count();

        return $all;
    }

    public function getEvents(){
        $availed = Accountability::where('user_id', auth()->user()->id)->pluck('accountability');
        // $row = FinanceEventModel::whereNotIn('id', $availed)->get();

        $dateToday = Carbon::now();
        $all = FinanceEventModel::where('event_date','>=', $dateToday)->whereNotIn('id', $availed)->orderBy('created_at', 'desc')->get();
        $response = [];
        foreach ($all as $item) {
            $response[] = array(
                'id' => $item->id,
                'name' => $item->name,
                'description' => $item->description,
                'price' => $item->price,
                'added_by' => $item->get_user->name,
                'status' => Carbon::parse($item->created_at)->diffForHumans(),
                'event_date' => $eventDate = Carbon::parse($item->event_date)->format('F d, Y g:ia')
            );
        }
        return response()->json($response);
    }
    public function showSubjectCourse(){
        $row = Subject::all()->where('course_id', auth()->user()->course_id);
        $response = [];
        foreach ($row as $data){
            $units = $data->lec_units + $data->lab_units;
            $response[] = array(
                'name' => $data->name,
                'subject_code' => $data->subject_code,
                'units' => $units,
            );
        }
        return response()->json($response);
    }
    public function getAvailableSubjects(){
        $enrolledSubjectIds = Enrolled::where('user_id', auth()->user()->id)->pluck('subject_id');
        $row = Subject::whereNotIn('id', $enrolledSubjectIds)->get();

        $response = [];
        foreach ($row as $data){
            $units = $data->lec_units + $data->lab_units;
            $response[] = array(
                'id' => $data->id,
                'name' => $data->name,
                'subject_code' => $data->subject_code,
                'subject_description' => $data->subject_description,
                'year' => $data->get_year->name,
                'semester' => $data->get_semester->name,
                'lec_units' => $data->lec_units,
                'lab_units' => $data->lab_units,
                'total' => $units,
                'button' => '<button type="button" data-id="'.$data->id.'" class="btn btn-info btn-sm add-btn" >Add</button>',
            );
        }
        return response()->json($response);
    }

    public function getStudentChoice($id){
        $response = [];
        $data = Subject::where('id', $id)->get();

        foreach ($data as $item){
            $response[] = array(
                'id' => $item->id,
                'name' => $item->name,
                'subject_code' => $item->subject_code,
                'subject_description' => $item->subject_description,
                'year' => $item->get_year->name,
                'semester' => $item->get_semester->name,
                'units' => $item->lec_units + $item->lab_units,
            );
        }

        return response()->json($response);
    }

    public function enrollSubject(Request $request){
        $enroll_subject = $request->input('data_arr');
        foreach($enroll_subject as $item){
            $data = Enrolled::create([
                'user_id' => auth()->user()->id,
                'subject_id' => $item['id']
            ]);
        }

        return json_encode($enroll_subject);

    }
}
