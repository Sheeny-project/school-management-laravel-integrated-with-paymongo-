<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentDashboard extends Controller
{
    public function index(){
        return view('enrollment_dashboard');
    }
}
