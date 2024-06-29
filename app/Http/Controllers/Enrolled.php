<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class Enrolled extends Controller
{
    public function index(){
        return view('enrolled');
    }

    public function show_enrolled(){
        $row = User::all()->where('role_id','2');
        $response = [];
        foreach ($row as $item) {
            $response[] = array(
                'id' => $item->id_number,
                'name' => $item->name,
                'age' => $item->age,
                'email' => $item->email,
                'gender' => $item->gender,
                'address' => $item->address,
                'course_id' => $item->course_id,
            );
        }
        return response()->json($response);
    }
}
