<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Enrolled;
use App\Models\FinanceEventModel;
use App\Models\Course;
use App\Models\Subject;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
    public function show_user(){
        $user = User::all();

        $response = [];
        foreach ($user as $item) {
            $response[] = array(
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'role' => $item->join_role->role,
            );
        }
        return response()->json($response);
    }
    public function getAllNotif(){
        $dateToday = Carbon::now();
        $event = FinanceEventModel::all();
        $course = Course::all();
        $subject = Subject::all();

        $response = [];
        foreach ($event as $item) {
            $response[] = array(
                'name' => (strlen($item->name) > 20) ? substr($item->name, 0, 20) . '...' : $item->name,
                'added_by' => $item->added_by,
                'created_at' => Carbon::parse($item->created_at)->diffForHumans(),
            );
        }
        foreach ($course as $item) {
            $response[] = array(
                'name' => (strlen($item->name) > 20) ? substr($item->name, 0, 20) . '...' : $item->name,
                'added_by' => $item->added_by,
                'created_at' => Carbon::parse($item->created_at)->diffForHumans(),
            );
        }
        foreach ($subject as $item) {
            $response[] = array(
                'name' => (strlen($item->name) > 20) ? substr($item->name, 0, 20) . '...' : $item->name,
                'added_by' => $item->added_by,
                'created_at' => Carbon::parse($item->created_at)->diffForHumans(),
            );
        }
        usort($response, function($a, $b) {
            return strtotime($a['created_at']) - strtotime($b['created_at']);
        });
        $response = array_slice($response, 0, 6);
        return response()->json($response);
    }
}
