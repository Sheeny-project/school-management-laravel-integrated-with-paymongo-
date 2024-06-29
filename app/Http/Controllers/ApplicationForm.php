<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Student;
class ApplicationForm extends Controller
{
    public function index(){
        $course = $this->getCourse();
        return view('application_form', compact('course'));
    }
    public function add_student(Request $request){
        $userId = User::latest()->first();
        $year = date('Y');
        $result = $year . "-". 11110 + ($userId->id + 1);
        $formattedNumber = ltrim($request->contact_no, '0');
        $motherNumber = ltrim($request->mother_contact, '0');
        $fatherNumber = ltrim($request->father_contact, '0');
        $user = $request->name;
        $userEmail = strtolower(str_replace(' ', '', $user));
        $add = User::create([
            'name' => $request->name,
            'email' => $userEmail . '@example.com',
            'password' => $result,
            'age' => $request->age,
            'id_number' => $result,
            'gender' => $request->gender,
            'role_id' => '2',
            'address' => $request->address,
            'contact_no' => '+63'.$formattedNumber,
            'course_id' => $request->course_id,
        ]);
        $student_id = ($userId->id + 1);
        $add_info = Student::create([

            'student_id' => $student_id,
            'mother_name' => $request->mother_name,
            'mother_age' => $request->mother_age,
            'mother_contact' => '+63'.$motherNumber,
            'father_name' => $request->father_name,
            'father_age' => $request->father_age,
            'father_contact' => '+63'.$fatherNumber
        ]);


        return redirect()->back()->with('success', $user.' added successfully');
    }

    public function getCourse(){
        $get = Course::all();

        return $get;
    }
}
