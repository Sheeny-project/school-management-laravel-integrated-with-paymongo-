<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrolled;
use App\Models\Subject;

class EnrolledSubject extends Controller
{
    public function index(){
        return view('enrolled_subject');
    }
    public function getEnrolledSubject(){
        // $enrolledSubjectIds = Enrolled::where('user_id', auth()->user()->id)->pluck('subject_id');
        // $row = Subject::whereIn('id', $enrolledSubjectIds)->get();
        $row = Enrolled::where('user_id', auth()->user()->id)->get();
        $response = [];
        foreach ($row as $data) {
            if($data->status_id == null){
                $status = '<span class="badge badge-warning">Pending</span>';
            }else{
                if($data->status_id == 4){
                    $status = '<span class="badge badge-success">'.$data->join_status->name.'</span>';
                }else{
                $status = '<span class="badge badge-danger">'.$data->join_status->name.'</span>';
                }
            }
            $response[] = array(
                'name' => $data->join_subject->name,
                'subject_code' => $data->join_subject->subject_code,
                'status' => $status,
                'action' => '<button class="btn btn-info btn-sm">View</button>',
            );
        }
        return response()->json($response);
    }
}
