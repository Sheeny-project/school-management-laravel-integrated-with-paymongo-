<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomModel;
use App\Models\RoomType;
use App\Models\Day;
use App\Models\SectionModel;
class Room extends Controller
{
    public function index(){
        $type = $this->showRoomType();
        return view('room', compact(['type']));
    }
    public function createRoom(Request $request){
        $create = RoomModel::create([
            'room_number' => $request->room_number,
            'room_type_id' => $request->type,
      ]);
      return redirect()->back()->with('success', $request->room_number. ' created successfully');
    }
    public function showRoom(){
        $all = RoomModel::all();
        $response = [];
        $id = 1;
        foreach ($all as $row) {
            $response[] = array(
                'id' => $id++,
                'room_number' => $row->room_number,
                'type' => $row->get_type->name,
                'button' => '<button type="button" class="btn btn-sm btn-info" data-id="'.$row->id.'" id="show-sections">Show</button>',
            );
        }
        return response()->json($response);
    }

    public function showRoomType(){
        $all = RoomType::all();

        return $all;
    }

    public function showSection(Request $request){
        $id = $request->query('id');
        $all = SectionModel::all()->where('room_id', $id);
        $id = 1;
        $response = [];
        foreach ($all as $row) {
            $response[] = array(
                'id' => $id++,
                'section_id' => $row->get_section->name,
                'subject_id' => $row->get_section->name,
                'slot' => $row->slot,
                'time_in' => date('g:i A', strtotime($row->time_in)),
                'time_out' => date('g:i A', strtotime($row->time_out)),
                'day_id' => $row->get_day->name,
            );

        }
        return response()->json($response);
    }
}
