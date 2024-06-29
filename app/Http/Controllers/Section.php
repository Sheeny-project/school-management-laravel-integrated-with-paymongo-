<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SectionInfoModel;
use App\Models\SectionModel;
class Section extends Controller
{
    public function index(){
        return view('section');
    }
    public function allSection(){
        $all = SectionInfoModel::all();

        $response = [];
        foreach ($all as $row){
            $response[] = array(
                'id' => $row->id,
                'name' => $row->name,
                'button' => '<button type="button" class="btn btn-sm btn-info" data-id="' . $row->id . '" id="show-details">Show</button>'
            );
        }
        return response()->json($response);
    }
    public function addSection(Request $request){
        $return = SectionInfoModel::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'Section added successfully');
    }
    public function getSectionDetails(Request $request){
        $id = $request->query('id');
        $data = SectionModel::all()->where('section_id', $id);
        $id = 1;
        $response = [];
        foreach ($data as $row)
        {
            $response[] = array(
                'id' => $id++,
                'subject' => $row->get_subject->subject_code,
                'slot' => $row->slot,
                'room' => $row->get_room->room_number,
                'time_in' => date('g:i A', strtotime($row->time_in)),
                'time_out' => date('g:i A', strtotime($row->time_out)),
                'day' => $row->get_day->name,
            );
        }
        return response()->json($response);
    }
}
